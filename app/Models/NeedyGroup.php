<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NeedyGroup
 *
 * @property int $id
 * @property int $needie_id
 * @property int $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup whereNeedieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NeedyGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class NeedyGroup extends Model
{
    use HasFactory;
    protected $guarded =[];
}
