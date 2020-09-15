<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnsFromUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('family_name')->nullable()->change();
            $table->dropColumn('first_name')->nullable()->change();
            $table->dropColumn('gender')->nullable()->change();
            $table->dropColumn('is_pet_owner')->nullable()->change();
            $table->dropColumn('num_cat')->nullable()->change();
            $table->dropColumn('num_large_dog')->nullable()->change();
            $table->dropColumn('num_middle_dog')->nullable()->change();
            $table->dropColumn('num_small_dog')->nullable()->change();
            $table->dropColumn('num_other')->nullable()->change();
            $table->dropColumn('cond_nearest_station')->nullable()->change();
            $table->dropColumn('cond_area')->nullable()->change();
            $table->dropColumn('cond_limit_cost')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
