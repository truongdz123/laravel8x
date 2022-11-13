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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('topic_id')->nullable();
            $table->string('title');
            $table->longText('content');
            $table->string('img');
            $table->string('posttype')->default('post');
            $table->string('metakey');
            $table->string('metades');
            $table->unsignedinteger('create_by');
            $table->unsignedinteger('update_by')->nullable();
            $table->unsignedinteger('status')->default(0);
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
        Schema::dropIfExists('posts');
    }
};
