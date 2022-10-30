<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Collection;

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
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
            $table->char('locale', 2)->default('en');

            //settings
            $config = new Collection([
                'additional_notifications' => 1,
                'client_schedules' => 1,
                'email_notifications' => 0,
                'news_on_updates' => 0,
            ]);
            $table->text('config')->default($config);
            /**
             * config => [
             *      'locale': (en/pl/..)
             *      'additional_notifications': (0,1)
             *      'client_schedules': (0,1)
             *      'email_notifications': (0,1)
             *      'news_on_updates': (0,1)
             * ]
             *
             */

            
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
