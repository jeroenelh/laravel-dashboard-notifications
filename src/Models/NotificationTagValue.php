<?php

namespace Microit\DashboardNotifications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @property int $id
 * @property int $tagId
 * @property int $notificationId
 * @property string $value
 * @method static NotificationTagValue create(array $array)
 * @method static Builder where(string $string, mixed $name)
 */
class NotificationTagValue extends Model
{
    protected $table = 'notification_tag_values';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'tag_id',
        'notification_id',
        'value',
        'model_source',
    ];
}
