<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_categories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('カテゴリID');
            $table->string('name')->comment('カテゴリ名');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_categories');
    }

//    INSERT INTO `products_categories`( `name`)
//VALUES
//	('インテリア'),
//	 ('家電'),
//	('ファッション'),
//    ('美容'),
//    ('本・雑誌')
}
