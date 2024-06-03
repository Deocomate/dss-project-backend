<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nganh;
use App\Models\TruongDH;
use App\Models\TruongDH_Nganh;
use Illuminate\Http\Request;

class TruongDhController extends Controller
{
    public function index()
    {
        $truongDhList = TruongDH::all();
        return view('admin.truongdh.index', compact(['truongDhList']));
    }

    public function show($id)
    {
        $nganhList = Nganh::all();
        $truongDh = TruongDH::where('id', $id)->first();
        return view('admin.truongdh.show', compact(['truongDh', 'nganhList']));
    }

    public function store_nganh(Request $request)
    {
        TruongDH_Nganh::insert($request->except("_token"));
        return to_route('admin.truongdh.show', ['id' => $request->input('truongdh_id')]);
    }
}
