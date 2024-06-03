<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi query()
 * @property int $id
 * @property int $truongdh_nganh_id
 * @property int $khoithi_id
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi whereKhoithiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh_KhoiThi whereTruongdhNganhId($value)
 * @property-read \App\Models\KhoiThi $khoithi
 * @mixin \Eloquent
 */
class TruongDH_Nganh_KhoiThi extends Model
{
    use HasFactory;

    protected $table = "TruongDH_Nganh_KhoiThi";

    public function khoithi()
    {
        return $this->belongsTo(KhoiThi::class, 'khoithi_id', 'id');
    }
}
