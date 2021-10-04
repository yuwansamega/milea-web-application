<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pendaftaran Masih Dibuka', 'Pendaftaran Telah Ditutup']);
            $table->date('open_regist');
            $table->date('close_regist');
            $table->date('open_ws');
            $table->date('close_ws');
            $table->text('title');
            $table->mediumText('describe');
            $table->string('place');
            $table->integer('quota');
            $table->text('cp');
            $table->text('criteria');
            $table->string('label_1');
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
        Schema::dropIfExists('workshops');
    }
}