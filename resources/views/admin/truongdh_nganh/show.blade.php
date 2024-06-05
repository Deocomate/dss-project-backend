<?php /**
 * @var \App\Models\TruongDH_Nganh $truongDhNganh
 * @var \App\Models\KhoiThi $khoiThi
 * @var \App\Models\KhoiThi $khoiThiList
 * @var \App\Models\TruongDH_Nganh_KhoiThi $item
 * @var \App\Models\DiemChuan $diemChuan
 */ ?>
@extends('admin.use.layouts.main')
@section('content')
    <h1>{{$truongDhNganh->truongDh->truongdh_ten}} / {{$truongDhNganh->nganh->nganh_ten}}</h1>
    <div class="row">
        <div class="col-4">
            <div class="card mb-3">
                <div class="card-header card-title">
                    Thêm khối thi cho ngành
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.truongdh.nganh.khoithi.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="truongdh_nganh_id" value="{{$truongDhNganh->id}}">
                        <div class="mb-3">
                            <label class="form-label">Khối thi</label>
                            <input class="form-control" type="text" list="khoithi_id_list" name="khoithi_id">
                            <datalist id="khoithi_id_list">
                                @foreach($khoiThiList as $khoiThi)
                                    <option value="{{$khoiThi->id}}">{{$khoiThi->khoithi_ten}}
                                        ({{$khoiThi->khoithi_mon1}}-{{$khoiThi->khoithi_mon2}}
                                        -{{$khoiThi->khoithi_mon3}})
                                    </option>
                                @endforeach
                            </datalist>
                        </div>
                        <button class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header card-title">
                    Thêm điểm thi
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.truongdh.nganh.diemchuan.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="truongdh_nganh_id" value="{{$truongDhNganh->id}}">
                        <div class="mb-3">
                            <label class="form-label">Điểm chuẩn</label>
                            <input class="form-control" type="number" step="0.1" name="diemchuan_diem" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Năm</label>
                            <input class="form-control" type="number" name="diemchuan_nam" required>
                        </div>
                        <button class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Khối thi</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($truongDhNganh->truongDhNganhKhoithiList as $item)
                    <tr>
                        <th>{{$item->khoithi->khoithi_ten}}</th>
                        <th><a href="{{ route('admin.truongdh.nganh.khoithi.delete',['id'=>$item->id]) }}">Xóa</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-4">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Năm</th>
                    <th>Điểm chuẩn</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($truongDhNganh->diemChuanList as $diemChuan)
                    <tr>
                        <th>{{$diemChuan->diemchuan_nam}}</th>
                        <th>{{$diemChuan->diemchuan_diem}}</th>
                        <th>
                            <a href="{{ route('admin.truongdh.nganh.diemchuan.delete',['id'=>$diemChuan->id]) }}">Xóa</a>
                        </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
