<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh query()
 * @property int $id
 * @property float $diem_chuan_trung_binh
 * @property float $hoc_phi_trung_binh
 * @property int $truongdh_id
 * @property int $nganh_id
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh whereDiemChuanTrungBinh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh whereHocPhiTrungBinh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh whereNganhId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH_Nganh whereTruongdhId($value)
 * @property-read \App\Models\Nganh $nganh
 * @property-read \App\Models\TruongDH $truongDh
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TruongDH_Nganh_KhoiThi> $truongdh_nganh_khoithi
 * @property-read int|null $truongdh_nganh_khoithi_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DiemChuan> $diemchuanList
 * @property-read int|null $diemchuan_list_count
 * @mixin \Eloquent
 */
class TruongDH_Nganh extends Model
{
    use HasFactory;

    protected $table = "truongdh_nganh";

    public function truongDh(): BelongsTo
    {
        return $this->belongsTo(TruongDH::class, 'truongdh_id', 'id');
    }

    public function nganh(): BelongsTo
    {
        return $this->belongsTo(Nganh::class, 'nganh_id', 'id');
    }

    public function truongdh_nganh_khoithi(): HasMany
    {
        return $this->hasMany(TruongDH_Nganh_KhoiThi::class, 'truongdh_nganh_id', 'id');
    }

    public function diemchuanList(): HasMany
    {
        return $this->hasMany(DiemChuan::class, 'truongdh_nganh_id', 'id');
    }
}
