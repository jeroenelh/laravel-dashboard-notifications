<?php

namespace Microit\DashboardNotifications;

use Microit\DashboardNotifications\Models\NotificationTag;

class NotificationTagValue
{
    protected ?NotificationTag $model = null;

    public function __construct(public readonly string $module, public readonly string $name, public readonly string $value)
    {
        /** @var ?NotificationTag $model */
        $model = NotificationTag::where('module', $this->module)->where('name', $this->name)->first();
        if ($model instanceof NotificationTag) {
            $this->model = $model;
        }
    }
}
