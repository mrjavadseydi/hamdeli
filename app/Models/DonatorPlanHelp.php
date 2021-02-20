<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DonatorPlanHelp
 *
 * @property int $id
 * @property int $plan_id
 * @property int $donator_id
 * @property int $donations_id
 * @property int $money
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp query()
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereDonationsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereDonatorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp wherePlanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DonatorPlanHelp whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DonatorPlanHelp extends Model
{
    use HasFactory;
    protected $guarded =[];
}
