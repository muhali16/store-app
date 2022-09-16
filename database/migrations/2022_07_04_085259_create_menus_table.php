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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('canteen_id');
            $table->foreignId('category_id');
            $table->string('name');
            $table->string('photo');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->string('is_recomended')->nullable();
            $table->string('is_empty')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('menus');
    }
};
