<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToShopmanagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopmanagers', function (Blueprint $table) {
            $table->string('name'); //カラム追加
            $table->integer('shop_id')->nullable(true)->change(); //カラム変更
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopmanagers', function (Blueprint $table) {
            $table->dropColumn('name');  //カラムの削除
            $table->integer('shop_id')->nullable(false)->change(); //カラムの変更削除
        });
    }
}
