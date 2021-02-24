<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NeedyRequest
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyRequest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NeedyRequest extends Model
{
    use HasFactory;
    protected $guarded =[];
}
