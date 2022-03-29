<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsSubcatergories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_subcategories', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('サブカテゴリID');
            $table->integer('product_category_id')->comment('カテゴリID');
            $table->string('name')->comment('サブカテゴリ名');
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
        Schema::dropIfExists('products_subcategories');
    }
//    INSERT INTO `products_subcategories`(`product_category_id`, `name`) VALUES
//('1','収納家具'),
//('1','寝具'),
//('1','ソファ'),
//('1','ベッド'),
//('1','照明'),
//('2','テレビ'),
//('2','掃除機'),
//('2','エアコン'),
//('2','冷蔵庫'),
//('2','レンジ'),
//('3','トップス'),
//('3','ボトム'),
//('3','ワンピース'),
//('3','ファッション小物'),
//('3','ドレス'),
//('4','ネイル'),
//('4','アロマ'),
//('4','スキンケア'),
//('4','香水'),
//('4','メイク'),
//('5','旅行'),
//('5','ホビー'),
//('5','写真集'),
//('5','小説'),
//('5','ライフスタイル')
}


