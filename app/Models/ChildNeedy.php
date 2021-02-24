<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChildNeedy
 *
 * @property int $id
 * @property int $needie_id
 * @property string $name
 * @property string $ratio
 * @property string $person_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereNeedieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy wherePersonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereRatio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildNeedy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ChildNeedy extends Model
{
    use HasFactory;
    protected $guarded =[];

}
