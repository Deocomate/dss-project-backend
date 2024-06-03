<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh query()
 * @property int $id
 * @property string $nganh_ten
 * @property int $khoinganh_id
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh whereKhoinganhId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nganh whereNganhTen($value)
 * @property-read \App\Models\KhoiNganh|null $khoiNganh
 * @mixin \Eloquent
 */
class Nganh extends Model
{
    use HasFactory;

    protected $table = "nganh";

    public function khoiNganh(): BelongsTo
    {
        return $this->belongsTo(KhoiNganh::class, 'khoinganh_id', 'id');
    }
}
