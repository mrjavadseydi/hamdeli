<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Priority
 *
 * @property int $id
 * @property int $needer_help_id
 * @property string $priority
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority query()
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereNeederHelpId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Priority whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Priority extends Model
{
    use HasFactory;
    protected $guarded =[];
}
