<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NeederPlan
 *
 * @property int $id
 * @property int $plan_id
 * @property int $needie_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan whereNeedieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NeederPlan extends Model
{
    use HasFactory;
    protected $guarded =[];
}
