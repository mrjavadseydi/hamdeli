<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Needy
 *
 * @property int $id
 * @property string $name
 * @property string $person_id
 * @property string $address
 * @property string $mobile
 * @property string $leader_status
 * @property string $bank_info
 * @property int|null $is_iranian
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Needy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Needy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Needy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereBankInfo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereIsIranian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereLeaderStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Needy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Needy extends Model
{
    use HasFactory;
}
