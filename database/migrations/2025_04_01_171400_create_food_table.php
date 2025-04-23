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
        // 1. Tạo bảng categories trước
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->longText('description');
            $table->timestamps();
        });

        // 2. Sau đó tạo bảng food với foreign key
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('count');
            $table->longText('description');
            $table->timestamps();
            //foreign key
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade'); //thằng 1 bị xóa thằng nhiều xóa theo
            //->onDelete('set null') //Không bị xóa ở bảng nhiều
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Xóa bảng food trước (để xóa foreign key)
        Schema::dropIfExists('food');
        // Sau đó xóa bảng categories
        Schema::dropIfExists('categories');
    }
};
