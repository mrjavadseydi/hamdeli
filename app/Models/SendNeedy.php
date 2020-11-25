<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendNeedy
 *
 * @property int $id
 * @property int $needie_id
 * @property int $send_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy whereNeedieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy whereSendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendNeedy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendNeedy extends Model
{
    use HasFactory;
}
