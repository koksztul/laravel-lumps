<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name');
            $table->integer('ratio')->default(0);
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->text('information')->nullable();
            $table->string('contact')->nullable();
            $table->string('open_hrs_mo')->nullable();
            $table->string('open_hrs_tu')->nullable();
            $table->string('open_hrs_we')->nullable();
            $table->string('open_hrs_th')->nullable();
            $table->string('open_hrs_fr')->nullable();
            $table->string('open_hrs_sa')->nullable();
            $table->string('open_hrs_sn')->nullable();
            $table->enum('type_of_purchase', ['kg', 'wycena', 'both']);
            $table->enum('day_of_delivery', ['poniedziałek', 'wtorek', 'środa', 'czwartek', 'piątek', 'sobota', 'niedziela']);
            $table->boolean('cash')->default(0);
            $table->boolean('card')->default(0);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
