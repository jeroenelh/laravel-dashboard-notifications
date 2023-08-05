<?php

namespace Microit\DashboardNotifications;

class NotificationTagProvider
{
    /** @var NotificationTag[] */
    protected array $tags = [];

    public function __construct()
    {
    }

    public function registerTag(NotificationTag $tag): void
    {
        if (! in_array($tag, $this->tags)) {
            $this->tags[] = $tag;
        }
    }
}
