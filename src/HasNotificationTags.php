<?php

namespace Microit\DashboardNotifications;

use Illuminate\Contracts\Foundation\Application;

trait HasNotificationTags
{
    /** @var Application */
    protected $app;

    public function registerNotificationTag(NotificationTag $tag): void
    {
        /** @var NotificationTagProvider $provider */
        $provider = $this->app->make(NotificationTagProvider::class);
        $provider->registerTag($tag);
    }
}
