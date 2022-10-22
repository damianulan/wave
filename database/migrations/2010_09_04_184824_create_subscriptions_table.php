<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Subscription contains details of single Axial subscription 
     * and all settings of a subscribing business.
     * 
     * Inside the application it's manageable by SuperAdmin ('root')
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('subscriptions', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('shortname');
        //     $table->string('fullname');
        //     $table->string('address');
        //     $table->integer('nin', 10);
        //     $table->tinyInteger('policy_accepted', 1); // 0 - No, 1 - Yes
        //     $table->text('config'); // JSON serialized config attributes
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};
