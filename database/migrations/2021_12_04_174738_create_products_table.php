<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('name');
            $table->string('slug');
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('image')->nullable();
            $table->string('qty')->nullable();
            $table->string('tax')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('trending')->nullable();
            $table->mediumText('meta_title');
            $table->mediumText('meta_desc');
            $table->mediumText('meta_keywords');
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
        Schema::dropIfExists('products');
    }
}
