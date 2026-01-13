<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Subscriber extends Model
{
    const STATUS_SUBSCRIBED = 1;
    const STATUS_UNSUBSCRIBED = 0;
    const STATUS_BOUNCED = 2;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'status',
    ];
}
