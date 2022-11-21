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
        Schema::create('clients_loyalties', function (Blueprint $table) {
            $table->char('client_id');
            $table->char('loyalty_id');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('loyalty_id')->references('id')->on('loyalties')->onDelete('cascade');

            $table->primary(['client_id','loyalty_id']);
            $table->timestamp('confirmed_at');
            $table->timestamps();
            $table->softDeletes();
        });  
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
