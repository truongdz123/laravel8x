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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedinteger('category_id');
            $table->unsignedinteger('supplier_id');
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->float('price');
            $table->float('price_slae');
            $table->unsignedinteger('number');
            $table->longText('details');
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
        Schema::dropIfExists('products');
    }
};
