<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountDownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_downs', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->longText('content');
            $table->longText('url');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->integer('priority')
                ->default(1)
                ->nullable(false);
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
        Schema::dropIfExists('count_downs');
    }
}
