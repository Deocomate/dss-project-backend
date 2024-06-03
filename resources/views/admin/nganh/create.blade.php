<?php /**
 * @var App\Models\KhoiNganh $khoiNganhList
 * @var App\Models\KhoiNganh $khoiNganh
 * @var App\Models\Nganh $nganh
 * @var App\Models\KhoiNganh $nganhList
 */ ?>
@extends("admin.use.layouts.main")
@section('content')
    <h1>Thêm ngành học mới</h1>
    <div class="row">
        <div class="col-6">
            <div class="card">
                <form action="{{ route('admin.nganh.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Tên ngành</label>
                            <input type="text" list="nganh_ten" class="form-control" name="nganh_ten" id="nganh_ten"
                                   required>
                        </div>
                        <datalist id="nganh_ten">
                            @foreach($nganhList as $nganh)
                                <option value="{{$nganh->id}}">{{$nganh->nganh_ten}}</option>
                            @endforeach
                        </datalist>
                        <div class="mb-3">
                            <label class="form-label">Thuộc nhóm ngành</label>
                            <input list="khoinganh_id" type="text" class="form-control" name="khoinganh_id" required>
                        </div>
                        <datalist id="khoinganh_id">
                            @foreach($khoiNganhList as $khoiNganh)
                                <option value="{{$khoiNganh->id}}">{{$khoiNganh->khoinganh_ten}}</option>
                            @endforeach
                        </datalist>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-6">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Tên ngành</th>
                </tr>
                </thead>
                <tbody class="tbody">
                @foreach($nganhList as $nganh)
                    <tr>
                        <td>{{$nganh->nganh_ten}} - {{$nganh->khoiNganh->khoinganh_ten}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        let nganhListJson = `{!! $nganhList->toJson()!!}`
        let nganhList = JSON.parse(nganhListJson)
        console.log(nganhList)
        let input_nganh_ten = document.getElementById("nganh_ten")
        input_nganh_ten.oninput = function () {
            let text = this.value.trim()
            let nganhListFilter = nganhList.filter(nganh => nganh.nganh_ten.toLowerCase().includes(text.toLowerCase()))
            console.log(nganhListFilter)
            let element_tbody = document.querySelector(".tbody")
            element_tbody.innerHTML = ``
            for (const item of nganhListFilter) {
                element_tbody.innerHTML += `
                <tr>
                    <td>${item.nganh_ten} - <b>Khối: </b>${item.khoi_nganh.khoinganh_ten}</td>
                </tr>
                `
            }
        }
    </script>
@endsection
