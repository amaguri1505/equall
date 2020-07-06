<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('good')->nullable();
            $table->string('bad')->nullable();
            $table->string('pet_type')->nullable();
            $table->string('pet_cnt')->nullable();
            $table->string('nearest_station')->nullable();
            $table->string('address')->nullable();
            $table->string('is_pet')->nullable();
            $table->string('cost')->nullable();
            $table->string('manage_cost')->nullable();
            $table->string('deposit')->nullable();
            $table->string('key_money')->nullable();
            $table->string('area')->nullable();
            $table->string('floor_plan')->nullable();
            $table->string('floor')->nullable();
            $table->string('age')->nullable();
            $table->string('structure')->nullable();
            $table->string('park')->nullable();
            $table->string('facility')->nullable();
            $table->string('start_date')->nullable();
            $table->string('corp')->nullable();
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
        Schema::dropIfExists('house_properties');
    }
}
