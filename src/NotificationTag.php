<?php

namespace Microit\DashboardNotifications;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Microit\DashboardNotifications\Models\NotificationTag as NotificationMTagModel;

class NotificationTag
{
    protected ?NotificationMTagModel $notificationTagModel;

    public function __construct(public readonly string $module, public readonly string $name, public readonly string $type, public readonly ?string $model = null)
    {
        /** @var ?NotificationMTagModel $notificationTagModel */
        $notificationTagModel = NotificationMTagModel::where('module', $this->module)->where('name', $this->name)->first();
        if (is_null($notificationTagModel)) {
            try {
                $notificationTagModel = NotificationMTagModel::create([
                    'module' => $this->module,
                    'name' => $this->name,
                    'type' => $this->type,
                    'model' => $this->model,
                ]);
            } catch (QueryException $exception) {
                Log::error($exception->getMessage());
            }
        }

        $this->notificationTagModel = $notificationTagModel;
    }
}
