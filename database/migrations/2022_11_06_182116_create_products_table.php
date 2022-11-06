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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 20);
            $table->decimal('price', 6, 2)->default(0.00);
            $table->decimal('price_net', 6, 2)->nullable();
            $table->string('photo')->nullable();
            $table->longText('description', 250)->nullable();
            $table->char('category_id', 36)->nullable();
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->char('manufacturer_id', 36)->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('product_manufacturers')->onDelete('cascade');
            $table->char('supplier_id', 36)->nullable();
            $table->foreign('supplier_id')->references('id')->on('product_suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
