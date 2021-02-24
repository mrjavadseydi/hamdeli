<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Info
 *
 * @property int $id
 * @property string $type
 * @property string $description
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Info newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Info query()
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Info whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Info extends Model
{
    use HasFactory;
    protected $guarded = [];

}
