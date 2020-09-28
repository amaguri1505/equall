<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumns2ndToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('family_name', 30)->after('email_verified_at')->nullable();
            $table->string('first_name', 30)->after('family_name')->nullable();
            $table->enum('gender', ['男性','女性'])->after('first_name')->nullable();
            $table->enum('is_pet_owner', ['はい','いいえ'])->after('gender')->nullable();
            $table->integer('num_cat')->after('is_pet_owner')->nullable();
            $table->integer('num_large_dog')->after('num_cat')->nullable();
            $table->integer('num_middle_dog')->after('num_large_dog')->nullable();
            $table->integer('num_small_dog')->after('num_middle_dog')->nullable();
            $table->integer('num_other')->after('num_small_dog')->nullable();
            $table->string('cond_nearest_station', 30)->after('num_other')->nullable();
            $table->string('cond_area', 30)->after('cond_nearest_station')->nullable();
            $table->integer('cond_limit_cost')->after('cond_area')->nullable();
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
