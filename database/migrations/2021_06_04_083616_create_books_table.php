<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('selflink');
            $table->string('image');
            $table->string('editorid');
            $table->string('gallery')->nullable();
            $table->string('description')->nullable();
            $table->double('price');
            $table->double('prePrice')->nullable();
            $table->string('size');
            $table->integer('qty')->default(1);
            $table->integer('categoryid')->nullable();
            $table->integer('viewer')->default(0);
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
        Schema::dropIfExists('books');
    }
}
