<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_watching_users', function (Blueprint $table) {
            $table->char('user_id');
            $table->char('watcher_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('watcher_id')->references('id')->on('users');

            $table->primary(['user_id','watcher_id']);

            $table->comment('Contains information about users observing other users, which provides extended notifications about their activity.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_watching_users');
    }
};
