<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
            $table->integer('parking_id')->nullable();
            $table->integer('code')->unsigned()->nullable();
            $table->dateTime('cancellation')->nullable();
            $table->dateTime('expire_time')->nullable();
            $table->boolean('penalty')->default(true);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });

        DB::statement('ALTER TABLE reservations CHANGE code code INT(4) UNSIGNED ZEROFILL NULL');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
