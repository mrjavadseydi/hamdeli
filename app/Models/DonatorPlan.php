<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DonatorPlan
 *
 * @property int $id
 * @property int $plan_id
 * @property int $donator_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan whereDonatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DonatorPlan extends Model
{
    use HasFactory;
    protected $guarded =[];
}
