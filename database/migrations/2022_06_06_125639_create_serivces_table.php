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
        Schema::create('services', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 30);
            $table->decimal('price', 6, 2)->nullable();
            $table->decimal('price_short_min', 6, 2)->nullable();
            $table->decimal('price_short_max', 6, 2)->nullable();
            $table->decimal('price_medium_min', 6, 2)->nullable();
            $table->decimal('price_medium_max', 6, 2)->nullable();
            $table->decimal('price_long_min', 6, 2)->nullable();
            $table->decimal('price_long_max', 6, 2)->nullable();
            $table->integer('time'); // in minutes
            $table->char('gender', 1); // 0 - female, 1 - male
            $table->longText('description', 250)->nullable();
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
        Schema::dropIfExists('services');
    }
};
