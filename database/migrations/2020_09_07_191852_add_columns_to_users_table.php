<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name', 30)->after('email_verified_at');
            $table->string('first_name', 30)->after('family_name');
            $table->enum('gender', ['男性','女性'])->after('first_name');
            $table->enum('is_pet_owner', ['はい','いいえ'])->after('gender');
            $table->integer('num_cat')->after('is_pet_owner');
            $table->integer('num_large_dog')->after('num_cat');
            $table->integer('num_middle_dog')->after('num_large_dog');
            $table->integer('num_small_dog')->after('num_middle_dog');
            $table->integer('num_other')->after('num_small_dog');
            $table->string('cond_nearest_station', 30)->after('num_other');
            $table->string('cond_area', 30)->after('cond_nearest_station');
            $table->integer('cond_limit_cost')->after('cond_area');
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
            $table->dropColumn('family_name');
            $table->dropColumn('first_name');
            $table->dropColumn('gender');
            $table->dropColumn('is_pet_owner');
            $table->dropColumn('num_cat');
            $table->dropColumn('num_large_dog');
            $table->dropColumn('num_middle_dog');
            $table->dropColumn('num_small_dog');
            $table->dropColumn('num_other');
            $table->dropColumn('cond_nearest_station');
            $table->dropColumn('cond_area');
            $table->dropColumn('cond_limit_cost');
        });
    }
}
