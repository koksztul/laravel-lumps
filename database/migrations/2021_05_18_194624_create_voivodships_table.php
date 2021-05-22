<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoivodshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voivodships', function (Blueprint $table) {
            $table->id();
            $table->enum('name', ['dolnoslaskie', 'kujawsko-pomorskie', 'lubelskie', 'lubuskie', 'lodzkie', 'malopolskie', 'mazowieckie', 'opolskie', 'podkarpackie', 'pomorskie', 'slaskie', 'swietokrzyskie', 'warminsko-mazurskie,', 'zachodniopomorskie', 'wielkoplskie', 'podlaskie'])->unique();
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
        Schema::dropIfExists('voivodships');
    }
}
