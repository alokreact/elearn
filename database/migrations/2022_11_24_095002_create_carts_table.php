<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable()->default(null);
            $table->decimal('price',10,2)->nullable()->default(null);
            $table->bigInteger('qty')->unsigned()->nullable()->default(null);
            $table->string('sku')->nullable()->default(null);
            $table->integer('course_id')->unsigned()->nullable()->default(null);
            $table->integer('user_id')->unsigned();
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
        Schema::dropIfExists('carts');
    }
}
