$(document).ready(function () {
    console.log("Page loaded!!! 12345");
    let label_hocphi = document.getElementById("label-hocphi")
    let input_hocphi = document.getElementById("input-hocphi")
    let input_loaihinh = document.getElementById("loaihinh")
    let input_khoinganh = document.getElementById("khoinganh")
    let input_khoithi = document.getElementById("khoithi")
    let input_diemchuan_from = document.getElementById("input-diemchuan-from")
    let input_diemchuan_to = document.getElementById("input-diemchuan-to")

    // Xử lý select:
    // Function to handle 'all' selection
    input_hocphi.addEventListener("input", function () {
        let hocphi = Number(this.value) * 50000;
        label_hocphi.innerHTML = `Dưới ${vnd(hocphi)}/Tín`
    })
    $('.select2-multiple').select2();

    function handleSelectAll(element) {
        element.on('select2:select', function (e) {
            if (e.params.data.id === 'all') {
                // Deselect all other options
                element.val('all').trigger('change');
            } else {
                // Deselect 'all' if other options are selected
                var values = element.val();
                if (values.includes('all')) {
                    values = values.filter(value => value !== 'all');
                    element.val(values).trigger('change');
                }
            }
        });

        element.on('select2:unselect', function (e) {
            if (e.params.data.id === 'all') {
                element.val(null).trigger('change');
            }
        });
    }

    // Apply the function to each select2 element
    handleSelectAll($('#tinh'));
    handleSelectAll($('#khoinganh'));
    handleSelectAll($('#khoithi'));
});

function vnd(number) {
    // Tạo đối tượng định dạng số tiền theo kiểu Việt Nam
    const formatter = new Intl.NumberFormat('vi-VN', {
        style: 'currency', currency: 'VND',
    });
    return formatter.format(number);
}

async function seachUniversities() {
    let khoiNganhSelect = $("#khoinganh").val();
    let khoiThiSelect = $("#khoithi").val();
    let loaiHinh = $("#loaihinh").val();
    let diemChuanFrom = parseFloat($("#input-diemchuan-from").val());
    let diemChuanTo = parseFloat($("#input-diemchuan-to").val());
    let hocPhi = parseFloat($("#input-hocphi").val()) * 50000;

    let response = await $.get("/api/truongdh/list");
    let truongDhList = JSON.parse(response);
    console.log(truongDhList)
    // Lọc danh sách theo tiêu chí
    let filteredList = truongDhList.filter(truong => {
        return (loaiHinh === 'all') || (truong.truongdh_loai_hinh === loaiHinh);
    });
    filteredList = filteredList.map(truong => {
        truong.truong_dh_nganh_list = truong.truong_dh_nganh_list.filter((nganh, index) => {
            let matchKhoiNganh = (khoiNganhSelect.includes('all')) || khoiNganhSelect.includes(String(nganh.nganh.khoinganh_id))
            let matchKhoiThi = (khoiThiSelect.includes('all')) || nganh.truong_dh_nganh_khoithi_list.some(khoithi => khoiThiSelect.includes(String(khoithi.khoithi_id)))
            let matchDiemChuan = (!diemChuanFrom || !diemChuanTo) || nganh.diem_chuan_trung_binh >= diemChuanFrom && nganh.diem_chuan_trung_binh <= diemChuanTo
            let matchHocPhi = nganh.hoc_phi_trung_binh <= hocPhi;
            return matchKhoiNganh && matchKhoiThi && matchDiemChuan && matchHocPhi;
        })
        return truong
    });
    filteredList = truongDhList.filter(truong => {
        return truong.truong_dh_nganh_list.length > 0
    });

    // Hiển thị kết quả lọc
    console.log(filteredList)
    // Hiển thị kết quả lọc
    let resultSection = $('#result');
    let tableBody = resultSection.find('tbody');
    tableBody.empty();

    filteredList.forEach((truong, index) => {
        let truongDhNganhHtml = ``

        truong.truong_dh_nganh_list.forEach((nganhItem, index) => {
            let diemchuanHtml = ``
            let khoithiHtml = ``
            nganhItem.diem_chuan_list.forEach(diem_chuan => {
                diemchuanHtml += `<li><b>${diem_chuan.diemchuan_nam}:</b> ${diem_chuan.diemchuan_diem}</li>`
            })
            nganhItem.truong_dh_nganh_khoithi_list.forEach(khoi_thi => {
                khoithiHtml += `${khoi_thi.khoithi.khoithi_ten}, `
            })
            truongDhNganhHtml += `
            <tr>
                <th>${nganhItem.nganh.nganh_ten}<br>(${khoithiHtml})</th>
                <td>${nganhItem.diem_chuan_trung_binh}</td>
                <td>${vnd(nganhItem.hoc_phi_trung_binh)}</td>
                <td>
                    <ul>
                        ${diemchuanHtml}
                    </ul>
                </td>
            </tr>`
        })
        let row = `
            <tr>
                <td style="width: 50px">${index + 1}</td>
                <td style="width: 150px">${truong.truongdh_ten}</td>
                <td>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width="300px">Ngành</th>
                                    <th width="200px">Điểm chuẩn trung bình</th>
                                    <th width="100px">Học phí</th>
                                    <th width="500px">Thông tin điểm theo năm</th>
                                </tr>
                            </thead>
                            <tbody>
                            ${truongDhNganhHtml}
                            </tbody>
                        </table>
                </div>
                </td>
            </tr>
        `;
        tableBody.append(row);
    });

    let resultHeader = resultSection.find('h3');
    resultHeader.text(`Tìm thấy tổng cộng ${filteredList.length} trường đại học theo yêu cầu`);

    if (filteredList.length === 0) {
        tableBody.append('<tr><td colspan="3" class="text-center">Không tìm thấy trường nào</td></tr>');
    }
}

