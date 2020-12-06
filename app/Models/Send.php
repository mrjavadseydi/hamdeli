<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Send
 *
 * @property int $id
 * @property string $title
 * @property string $date
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Send newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Send newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Send query()
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $extera_money
 * @property string|null $extera_description
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereExteraDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Send whereExteraMoney($value)
 */
class Send extends Model
{
    use HasFactory;
    protected $guarded =[];

}
