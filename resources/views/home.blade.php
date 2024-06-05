<?php /**
 * @var \App\Models\KhoiNganh $khoiNganh
 * @var \App\Models\KhoiNganh $khoiNganhList
 * @var \App\Models\KhoiThi $khoiThi
 * @var \App\Models\KhoiThi $khoiThiList
 */ ?>
@extends('admin.use.layouts.main')
@section('content')
    <div class="app">
        <section class="container mb-3">
            <h1>Tìm trường đại học</h1>
            <div class="card">
                <form onsubmit="return false">
                    <div class="card-header">
                        <span><i class="bi bi-funnel"></i> Bộ lọc</span>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label" for="tinh">Tỉnh / thành phố</label>
                            <select name="tinhDS[]" id="tinh" class="select2-multiple form-select" multiple="multiple">
                                <option value="all">Tất cả</option>
                                <option value="HN" selected>Hà Nội</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="loaihinh">Loại hình</label>
                            <select name="loaihinh" id="loaihinh" class="form-select">
                                <option value="all" selected>Tất cả</option>
                                <option value="Dân lập">Dân lập</option>
                                <option value="Công lập">Công lập</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="khoinganh">Ngành học</label>
                            <select name="khoinganhDS[]" id="khoinganh" class="select2-multiple form-select"
                                    multiple="multiple">
                                <option value="all" selected>Tất cả</option>
                                @foreach($khoiNganhList as $khoiNganh)
                                    <option value="{{$khoiNganh->id}}">{{$khoiNganh->khoinganh_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="khoithi">Khối thi</label>
                            <select name="khoithiDS[]" id="khoithi" class="select2-multiple form-select"
                                    multiple="multiple">
                                <option value="all" selected>Tất cả</option>
                                @foreach($khoiThiList as $khoiThi)
                                    <option value="{{$khoiThi->id}}">{{$khoiThi->khoithi_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Điểm chuẩn</label>
                            <div class="row g-3">
                                <div class="col-6">
                                    <input type="number" placeholder="Từ ..." class="form-control" step="0.01" min="0"
                                           max="50" id="input-diemchuan-from">
                                </div>
                                <div class="col-6">
                                    <input type="number" placeholder="Đến ..." class="form-control" step="0.01" min="0"
                                           max="50" id="input-diemchuan-to">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="input-hocphi">Học phí: <b id="label-hocphi">Dưới
                                    500.000đ/Tín</b></label>
                            <input type="range" class="form-range" name="hocphi" id="input-hocphi" min="0" value="10"
                                   max="100">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button onclick="seachUniversities()" class="btn btn-primary">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </section>
        <section id="result" class="container mb-3">
            <h3>Tìm thầy tổng cộng n trường đại học theo yêu cầu</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên trường</th>
                        <th>Xem chi tiết</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
