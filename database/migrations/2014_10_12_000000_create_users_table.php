<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('nickname')->nullable();
            $table->char('gender','1');
            $table->date('birthdate')->nullable();
            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();

            $table->string('address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pesel', 11)->nullable();

            //settings
            $table->char('locale', 2);
            $table->char('additional_notifications', 2)->nullable();
            $table->char('client_schedules', 2)->nullable();
            $table->char('email_notifications', 2)->nullable();
            $table->char('news_on_updates', 2)->nullable();

            //fk
            $table->char('location_id', 36)->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->tinyInteger('status')->default('1'); // 0 - blocked, 1 - active
            $table->tinyInteger('force_passwordchange')->default('0');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
