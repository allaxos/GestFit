<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::disableForeignKeyConstraints();
        Schema::create('message_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('objet');
            $table->text('message');
            $table->unsignedBigInteger('user_id'); // seeder
            $table->unsignedBigInteger('fk_user_received');
            $table->boolean('is_read')->default(false);
            //$table->foreign('fk_user_seeder')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
            //$table->foreign('fk_user_received')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('message_users');
    }
}
