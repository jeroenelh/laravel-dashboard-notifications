<?php

namespace Microit\DashboardNotifications;

use Microit\DashboardNotifications\Models\NotificationTag as Model;

class NotificationTag
{
    protected Model $model;

    public function __construct(public readonly string $module, public readonly string $name, public readonly string $type)
    {
        /** @var ?Model $model */
        $model = Model::where('module', $this->module)->where('name', $this->name)->first();
        if (is_null($model)) {
            $model = Model::create([
                'module' => $this->module,
                'name' => $this->name,
                'type' => $this->type,
            ]);
        }

        $this->model = $model;
    }
}
