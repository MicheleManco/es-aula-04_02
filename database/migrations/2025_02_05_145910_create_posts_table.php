<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('subtitle');
            $table->text('text');
            $table->date('date');
            
            $table->timestamps();
            
            $table -> unsignedBigInteger('category_id')->nullable();
            $table  -> foreign('category_id')
                    -> references('id')
                    -> on('categories');

            // $table ->unsignedBigInteger('post_tag_id')->nullable();
            // $table ->foreign('post_tag_id')
            //         ->references('id')
            //         ->on('post_tag');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
