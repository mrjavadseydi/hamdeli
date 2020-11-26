<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendDetails
 *
 * @property int $id
 * @property int $source_type
 * @property int $Source_id
 * @property int $send_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereSendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereSourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendDetails extends Model
{
    use HasFactory;
    protected $guarded =[];

}
