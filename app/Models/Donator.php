<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Donator
 *
 * @property int $id
 * @property string $name
 * @property string|null $person_id
 * @property string|null $address
 * @property string $mobile
 * @property string $cooperation_type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Donator newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donator newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donator query()
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereCooperationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donator whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Donator extends Model
{
    use HasFactory;
}
