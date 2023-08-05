<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notification_tags', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->set('type', ['string', 'bool', 'integer']);
            $table->timestamps();
        });

        Schema::create('notification_tag_values', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->foreignIdFor(\Microit\DashboardNotifications\Models\NotificationTag::class, 'tag_id');
            $table->foreignIdFor(\Microit\DashboardNotifications\Models\Notification::class, 'notification_id');
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('class');
            $table->json('objects')->default(json_encode([]));
            $table->string('title')->nullable();
            $table->string('message')->nullable();
            $table->string('type')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('notification_tag_values');
        Schema::dropIfExists('notification_tags');
    }
};
