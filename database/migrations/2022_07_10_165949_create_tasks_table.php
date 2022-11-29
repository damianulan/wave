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
        Schema::create('tasks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->text('message')->nullable();
            $table->integer('priority')->default(0);
            $table->char('target_id', 36)->nullable();
            $table->foreign('target_id')->references('id')->on('users')->onDelete('cascade');
            $table->char('affiliated_client_id', 36)->nullable();
            $table->foreign('affiliated_client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->char('author_id', 36);
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('deadline')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
