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
        //
        Schema::create('regionhub', function (Blueprint $table) {
            //
            $table->id();
            $table->unsignedBiginteger('regions_id')->unsigned();
            $table->unsignedBiginteger('cars_id')->unsigned();
    
            $table->foreign('regions_id')->references('id')->on('regions')->onDelete('cascade');
            $table->foreign('cars_id')->references('id')->on('carhubs')->onDelete('cascade');
    
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
        //
    }
};
