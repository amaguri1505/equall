<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsEstateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('estate_agents', function (Blueprint $table) {
            $table->tinyInteger('email_verified')->default(0);
            $table->string('email_verify_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estate_agents', function (Blueprint $table) {
            $table->dropColumn('email_verified');
            $table->dropColumn('email_verify_token');
        });
    }
}
