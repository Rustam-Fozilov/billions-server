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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string("book_name");
            $table->string("author_name");
            $table->text("book_description");
            $table->string("book_image");
            $table->integer("book_price");
            $table->integer("page_count");
            $table->bigInteger("category_id")->unsigned();
            $table->string("cover_type");
            $table->string("book_language");
            $table->string("book_year");
            $table->string("keywords");
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
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
};
