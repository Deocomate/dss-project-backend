<?php /**
 * @var \App\Models\TruongDH $truongDh
 * @var \App\Models\TruongDH_Nganh $truongDhNganh
 * @var \App\Models\Nganh $nganhList
 * @var \App\Models\Nganh $nganh
 */ ?>
@extends("admin.use.layouts.main")
@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card mb-3">
                <div class="card-header card-title">Thêm ngành học</div>
                <div class="card-body">
                    <form action="{{ route('admin.truongdh.store_nganh') }}" method="post">
                        @csrf
                        <input type="hidden" name="truongdh_id" value="{{$truongDh->id}}">
                        <div class="mb-3">
                            <lable class="form-label">Ngành học</lable>
                            <input type="text" list="nganh_id" name="nganh_id" class="form-control" required>
                            <datalist id="nganh_id">
                                @foreach($nganhList as $nganh)
                                    <option value="{{$nganh->id}}">{{$nganh->nganh_ten}}</option>
                                @endforeach
                            </datalist>
                        </div>
                        <input type="hidden" name="truongdh_id" value="{{$truongDh->id}}">
                        <div class="mb-3">
                            <lable class="form-label">Điểm chuẩn trung bình</lable>
                            <input type="number" step="0.1" name="diem_chuan_trung_binh" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <lable class="form-label">Học phí trung bình / tín</lable>
                            <input type="number" name="hoc_phi_trung_binh" class="form-control" required>
                        </div>
                        <button class="btn btn-primary">
                            Lưu
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-9">
            <h1>{{$truongDh->truongdh_ten}}</h1>
            <div class="mb-3">
                <table class="table table-bordered table-hover">
                    <tbody>
                    <tr>
                        <th>Tên</th>
                        <td>{{$truongDh->truongdh_ten}}</td>
                    </tr>
                    <tr>
                        <th>Mã</th>
                        <td>{{$truongDh->truongdh_ma}}</td>
                    </tr>
                    <tr>
                        <th>Viết tắt</th>
                        <td>{{$truongDh->truongdh_viet_tat}}</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{$truongDh->truongdh_dia_chi}}</td>
                    </tr>
                    <tr>
                        <th>Loại hình</th>
                        <td>{{$truongDh->truongdh_loai_hinh}}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{$truongDh->truongdh_so_dth}}</td>
                    </tr>
                    <tr>
                        <th>Web trường</th>
                        <td>{{$truongDh->truongdh_web}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <div class="card">
                    <div class="card-header">
                        Danh sách ngành học
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Ngành</th>
                                <th>Học phí</th>
                                <th>DTB</th>
                                <th>Thông tin điểm chuẩn</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($truongDh->truongdh_nganh as $truongDhNganh)
                                <tr>
                                    <td>{{$truongDhNganh->nganh->nganh_ten}}</td>
                                    <td style="width: 100px">{{$truongDhNganh->hoc_phi_trung_binh}}</td>
                                    <td style="width: 100px">{{$truongDhNganh->diem_chuan_trung_binh}}</td>
                                    <td>
                                        <a href="{{ route('admin.truongdh.nganh.show',['id'=>$truongDhNganh->id]) }}">Thông
                                            tin ngành học</a>
                                    </td>
                                    <td style="width: 50px"><a href="">Xóa</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
