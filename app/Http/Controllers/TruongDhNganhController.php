<?php

namespace App\Http\Controllers;

use App\Models\DiemChuan;
use App\Models\KhoiThi;
use App\Models\TruongDH_Nganh;
use App\Models\TruongDH_Nganh_KhoiThi;
use Illuminate\Http\Request;

class TruongDhNganhController extends Controller
{
    public function show($id)
    {
        $khoiThiList = KhoiThi::all();
        $truongDhNganh = TruongDH_Nganh::where('id', $id)->first();
        return view('admin.truongdh_nganh.show', compact(['truongDhNganh', 'khoiThiList']));
    }

    public function store_khoithi(Request $request)
    {
        TruongDH_Nganh_KhoiThi::insert($request->except('_token'));
        return to_route('admin.truongdh.nganh.show', ['id' => $request->input('truongdh_nganh_id')]);
    }

    public function store_diemchuan(Request $request)
    {
        DiemChuan::insert($request->except('_token'));
        return to_route('admin.truongdh.nganh.show', ['id' => $request->input('truongdh_nganh_id')]);
    }

    public function delete_khoithi($id)
    {
        $truongDhNganhId = TruongDH_Nganh_KhoiThi::where('id', $id)->first()->truongdh_nganh_id;
        TruongDH_Nganh_KhoiThi::where('id', $id)->delete();
        return to_route('admin.truongdh.nganh.show', ['id' => $truongDhNganhId]);
    }

    public function delete_diemchuan($id)
    {
        $truongDhNganhId = DiemChuan::where('id', $id)->first()->truongdh_nganh_id;
        DiemChuan::where('id', $id)->delete();
        return to_route('admin.truongdh.nganh.show', ['id' => $truongDhNganhId]);
    }
}
