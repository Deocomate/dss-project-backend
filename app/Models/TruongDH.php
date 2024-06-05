<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH query()
 * @property int $id
 * @property string $truongdh_ma
 * @property string $truongdh_viet_tat
 * @property string $truongdh_dia_chi
 * @property string $truongdh_loai_hinh
 * @property string $truongdh_so_dth
 * @property string|null $truongdh_web
 * @property int $tinh_id
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTinhId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhDiaChi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhLoaiHinh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhMa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhSoDth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhVietTat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhWeb($value)
 * @property string $truongdh_ten
 * @method static \Illuminate\Database\Eloquent\Builder|TruongDH whereTruongdhTen($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TruongDH_Nganh> $truongdh_nganh
 * @property-read int|null $truongdh_nganh_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TruongDH_Nganh> $truongDhNganhList
 * @property-read int|null $truong_dh_nganh_list_count
 * @mixin \Eloquent
 */
class TruongDH extends Model
{
    use HasFactory;

    protected $table = "truongdh";

    public function truongDhNganhList(): HasMany
    {
        return $this->hasMany(TruongDH_Nganh::class, 'truongdh_id', 'id');
    }
}
