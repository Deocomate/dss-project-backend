<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi query()
 * @property int $id
 * @property string $khoithi_ten
 * @property string $khoithi_mon1
 * @property string $khoithi_mon2
 * @property string $khoithi_mon3
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi whereKhoithiMon1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi whereKhoithiMon2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi whereKhoithiMon3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|KhoiThi whereKhoithiTen($value)
 * @mixin \Eloquent
 */
class KhoiThi extends Model
{
    use HasFactory;

    protected $table = "khoithi";
}
