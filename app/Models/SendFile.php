<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SendFile
 *
 * @property int $id
 * @property int $send_id
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile whereSendId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SendFile extends Model
{
    use HasFactory;
    protected $guarded =[];

}
