<?php

namespace Microit\DashboardNotifications;

use Microit\DashboardNotifications\Models\Notification;

class Event
{
    protected ?string $title = null;

    protected ?string $message = null;

    protected ?string $type = null;

    protected ?string $avatar = null;

    protected array $notificationTagValues = [];

    public function __construct(public readonly array $objects)
    {
    }

    public function notify(): Notification
    {
        $notification = Notification::create([
           'class' => get_called_class(),
           'objects' => $this->objects,
           'title' => $this->title,
           'message' => $this->message,
           'type' => $this->type,
           'avatar' => $this->avatar,
        ]);

        /** @var NotificationTagValue $notificationTagValue */
        foreach ($this->notificationTagValues as $notificationTagValue) {
            if (is_null($notificationTagValue->model)) {
                continue;
            }

            \Microit\DashboardNotifications\Models\NotificationTagValue::create([
                'tag_id' => $notificationTagValue->model->id,
                'notification_id' => $notification->id,
                'value' => $notificationTagValue->value,
                'model_source' => ($notificationTagValue->model->type == 'model') ? $notificationTagValue->modelSource : null,
            ]);
        }

        return $notification;
    }
}
