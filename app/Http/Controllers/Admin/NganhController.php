<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhoiNganh;
use App\Models\Nganh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NganhController extends Controller
{
    public function create()
    {
        $khoiNganhList = KhoiNganh::get();
        $nganhList = Nganh::get();
        return view("admin.nganh.create", compact(['khoiNganhList', 'nganhList']));
    }

    public function store(Request $request)
    {
        Nganh::insert($request->except("_token"));
        return to_route("admin.nganh.create");
//        dd($request->all());
    }
}
