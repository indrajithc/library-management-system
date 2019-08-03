<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->unique(); 
            $table->text('description');

            $table->timestamps();
        });
    }

    /**
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_categories');
    }
}
