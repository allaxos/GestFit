<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            //$table->string('adresse');
            $table->float('prix');
            $table->date('dateLocation');
            $table->time('timeDebut');
            $table->time('timeFin');
            $table->string('description');
            //$table->string('image')->default('default');
            $table->unsignedBigInteger('user_id');
            //$table->unsignedBigInteger('localite_id');
            $table->unsignedBigInteger('salle_id');
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
        Schema::dropIfExists('annonces');
    }
}
