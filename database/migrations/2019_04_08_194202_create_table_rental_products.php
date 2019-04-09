<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRentalProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_rental_products', function (Blueprint $table) {            
            $table->increments('rp_id');
            $table->string('rc_idfk');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->longText('image_url')->nullable();
            $table->integer('stock')->default(1);
            $table->integer('status')->default(1);
            $table->integer('rental_type')->default(1);
            $table->decimal('rental_rate', 11,2);
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
        Schema::dropIfExists('tbl_rental_products');
    }
}
