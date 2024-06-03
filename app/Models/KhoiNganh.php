<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh query()
 * @property int $id
 * @property string $khoinganh_ten
 * @property string|null $khoinganh_chi_tiet
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh whereKhoinganhChiTiet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiNganh whereKhoinganhTen($value)
 * @mixin \Eloquent
 */
class KhoiNganh extends Model
{
    use HasFactory;

    protected $table = "khoinganh";
}
