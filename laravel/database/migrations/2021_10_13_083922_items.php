<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('slug')->index()->collation('utf8mb4_unicode_ci');
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('stock')->default(0);
            $table->integer('price')->default(0);
            $table->integer('is_active')->unsigned();
            $table->Integer('user_id')->unsigned();
            $table->Integer('category_id')->unsigned();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('items', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
