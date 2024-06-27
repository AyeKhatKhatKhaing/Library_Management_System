<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_cards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('borrowbookId');
            $table->char('bookname');
            $table->char('bookCat');
            $table->char('author');
            $table->text('price');
            $table->text('remark')->nullable();
            $table->enum('availability', ['0','1'])->default('1');
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
        Schema::dropIfExists('book_cards');
    }
}
