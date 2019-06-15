<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequestQoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_request_quote', function (Blueprint $table) {            
            $table->increments('id')->index();
            $table->string('service_id');
            $table->string('email');
            $table->string('contact')->nullable();
            $table->string('name')->nullable();
            $table->text('message')->nullable();            
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
        Schema::dropIfExists('tbl_request_quote');
    }
}
