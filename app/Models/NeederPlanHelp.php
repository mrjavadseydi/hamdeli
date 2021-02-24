<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NeederPlanHelp
 *
 * @property int $id
 * @property int $plan_id
 * @property int $needie_id
 * @property string $title
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereNeedieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeederPlanHelp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NeederPlanHelp extends Model
{
    use HasFactory;
    protected $guarded =[];
}
