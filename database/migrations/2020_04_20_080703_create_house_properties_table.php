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
            $table->enum('type', ['賃貸']);
            $table->enum('is_pet', ['可']);
            $table->enum('property_type', ["マンション", "アパート", "戸建て", "テラスハウス", "シェアハウス"]);
            $table->string('name', 200);
            $table->string('hitokoto', 200)->nullable();
            $table->string('good', 200)->nullable();
            $table->string('bad', 200)->nullable();
            $table->enum('pet_types', ["犬", "猫", "犬と猫"])->nullable();
            $table->enum('pet_cnt', ["1", "2", "3", "4", "5", "上限なし", "お問い合わせください"])->nullable();
            $table->string('nearest_station', 200);
            $table->enum('minutes_on',
                [
                    "徒歩1分", "徒歩2分", "徒歩3分", "徒歩4分", "徒歩5分",
                    "徒歩6分", "徒歩7分", "徒歩8分", "徒歩9分", "徒歩10分",
                    "徒歩11分", "徒歩12分", "徒歩13分", "徒歩14分", "徒歩15分",
                    "徒歩16分", "徒歩17分", "徒歩18分", "徒歩19分", "徒歩20分",
                    "徒歩21分", "徒歩22分", "徒歩23分", "徒歩24分", "徒歩25分",
                    "徒歩26分", "徒歩27分", "徒歩28分", "徒歩29分", "徒歩30分",
                ]
            );
            $table->string('address', 200);
            $table->integer('cost');
            $table->integer('manage_cost')->nullable();
            $table->enum('deposit',
                ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分",
                    "5ヶ月分", "お問い合わせください"]
            );
            $table->enum('deposit_for_pet',
                ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分",
                    "5ヶ月分", "お問い合わせください"]
            )->nullable();
            $table->enum('key_money',
                ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分",
                    "5ヶ月分", "お問い合わせください"]
            );
            $table->enum('deposit_ex',
                ["0ヵ月分", "1ヶ月分", "2ヶ月分", "3ヶ月分", "4ヶ月分",
                    "5ヶ月分", "お問い合わせください"]
            )->nullable();
            $table->integer('update_cost')->nullable();
            $table->integer('insurance')->nullable();
            $table->string('insurance_corp', 200)->nullable();
            $table->string('cost_memo', 200)->nullable();
            $table->string('deal_form', 200)->nullable();
            $table->integer('area');
            $table->enum('floor_plan', [
                "1LDK", "1DK", "1SLDK", "1K", "1R",
                "2LDK", "2DK", "2SLDK", "2K", "2R",
                "3LDK", "3DK", "3SLDK", "3K", "3R",
                "4LDK", "4DK", "4SLDK", "4K", "4R",
                "5LDK", "5DK", "5SLDK", "5K", "5R",
                "6LDK", "6DK", "6SLDK", "6K", "6R",
                "7LDK", "7DK", "7SLDK", "7K", "7R",
                "お問い合わせください",
            ]);
            $table->integer('floor')->nullable();
            $table->string('age', 10);
            $table->enum('structure',
                [
                    "木造",
                    "鉄骨造",
                    "鉄筋コンクリート",
                    "鉄骨鉄筋コンクリート",
                    "その他"
                ]
            );
            $table->enum('park', ["有", "無"])->nullable();
            $table->string('other_condition', 200)->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('corp_id');
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
