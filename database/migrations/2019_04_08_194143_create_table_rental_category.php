<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRentalCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rental_category', function (Blueprint $table) {            
            $table->increments('rc_id');            
            $table->string('category_name');            
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_rental_category');
    }
}
