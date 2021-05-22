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
            $table->integer('ratio');
            $table->string('address');
            $table->string('open_hrs_mo');
            $table->string('open_hrs_tu');
            $table->string('open_hrs_we');
            $table->string('open_hrs_th');
            $table->string('open_hrs_fr');
            $table->string('open_hrs_sa');
            $table->string('open_hrs_sn');
            $table->enum('type_of_purchase', ['kg', 'valuation', 'both']);
            $table->enum('day_of_delivery', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
            $table->boolean('cash');
            $table->boolean('card');
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
