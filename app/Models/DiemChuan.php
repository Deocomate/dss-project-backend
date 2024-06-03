<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $truongdh_nganh_id
 * @property int $diemchuan_diem
 * @property int $diemchuan_nam
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan whereDiemchuanDiem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan whereDiemchuanNam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DiemChuan whereTruongdhNganhId($value)
 * @mixin \Eloquent
 */
class DiemChuan extends Model
{
    use HasFactory;

    protected $table = "diemchuan";
}
