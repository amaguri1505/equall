<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPetCntFromHousePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('house_properties', function (Blueprint $table) {
            DB::statement("ALTER TABLE house_properties MODIFY COLUMN pet_cnt ENUM('1頭', '2頭', '3頭', '4頭', '5頭', '上限なし', 'お問い合わせください','1','2','3','4','5')");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('house_properties', function (Blueprint $table) {
            //
        });
    }
}
