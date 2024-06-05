<?php

use App\Http\Controllers\Admin\NganhController;
use App\Http\Controllers\Admin\TruongDhController;
use App\Http\Controllers\Admin\TruongDhNganhController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Fe\HomeController;
use App\Http\Controllers\Fe\ApiController;

Route::get('/', [HomeController::class, "index"], "")->name("home");
Route::get('/api/truongdh/list', [ApiController::class, "list"], "")->name("api.truongdh.list");

Route::get("/admin/nganh/create", [NganhController::class, "create"])->name("admin.nganh.create");
Route::post("/admin/nganh/store", [NganhController::class, "store"])->name("admin.nganh.store");

Route::get("/admin/truongdh", [TruongDhController::class, "index"])->name("admin.truongdh.index");
Route::get("/admin/truongdh/show/{id}", [TruongDhController::class, "show"])->name("admin.truongdh.show");
Route::post("/admin/truongdh/nganh", [TruongDhController::class, "store_nganh"])->name("admin.truongdh.store_nganh");

Route::get("/admin/truongdh/nganh/{id}", [TruongDhNganhController::class, "show"])->name("admin.truongdh.nganh.show");

Route::post("/admin/truongdh/nganh/khoithi", [TruongDhNganhController::class, "store_khoithi"])->name("admin.truongdh.nganh.khoithi.store");
Route::post("/admin/truongdh/nganh/diemchuan", [TruongDhNganhController::class, "store_diemchuan"])->name("admin.truongdh.nganh.diemchuan.store");
Route::get("/admin/truongdh/nganh/khoithi/{id}/delete", [TruongDhNganhController::class, "delete_khoithi"])->name("admin.truongdh.nganh.khoithi.delete");
Route::get("/admin/truongdh/nganh/diemchuan/{id}/delete", [TruongDhNganhController::class, "delete_diemchuan"])->name("admin.truongdh.nganh.diemchuan.delete");
