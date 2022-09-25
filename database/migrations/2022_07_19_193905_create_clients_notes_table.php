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
        Schema::create('clients_notes', function (Blueprint $table) {
            $table->uuid('id');
            $table->longText('text');
            $table->char('client_id', 36);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->char('added_by', 36)->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('clients_notes');
    }
};
