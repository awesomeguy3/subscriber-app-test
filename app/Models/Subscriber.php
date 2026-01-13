<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $email
 * @property string $name
 * @property integer $status
 */
class Subscriber extends Model
{
    const STATUS_SUBSCRIBED = 1;
    const STATUS_UNSUBSCRIBED = 0;
    const STATUS_BOUNCED = 2;

    public static $statuses = [
        'subscribed' => self::STATUS_SUBSCRIBED,
        'unsubscribed' => self::STATUS_UNSUBSCRIBED,
        'bounced' => self::STATUS_BOUNCED,
    ];

    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'status',
    ];
}
