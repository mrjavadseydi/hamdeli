<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Donations
 *
 * @property int $id
 * @property int $donator_id
 * @property string $title
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Donations newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donations newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Donations query()
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereDonatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Donations whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Donations extends Model
{
    use HasFactory;
}
