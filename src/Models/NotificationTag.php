<?php

namespace Microit\DashboardNotifications\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * @property int $id
 * @property string $module
 * @property string $name
 * @property string $type
 * @property string $model
 * @method static NotificationTag create(array $array)
 * @method static Builder where(string $string, mixed $name)
 */
class NotificationTag extends Model
{
    protected $table = 'notification_tags';

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'module',
        'name',
        'type',
        'model',
    ];
}
