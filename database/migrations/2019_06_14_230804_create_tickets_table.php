<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->morphs('userable');
            $table->integer('parking_id')->nullable();
            $table->string('code')->nullable();
            $table->integer('price')->nullable();
            $table->boolean('paid')->default(false);
            $table->dateTime('entrance_time')->nullable();
            $table->dateTime('bonus_time')->nullable();

            $table->engine = 'InnoDB';
            $table->unique('code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
