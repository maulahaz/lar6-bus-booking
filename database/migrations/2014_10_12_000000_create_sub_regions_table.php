<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_regions', function (Blueprint $table) {
            $table->bigIncrements('sub_region_id');
            $table->string('sub_region_name');
            $table->string('sub_region_code');
            $table->integer('region_id'); // its the Fk okay
            $table->boolean('status')->default(0); // active
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
        Schema::dropIfExists('sub_regions');
    }
}
