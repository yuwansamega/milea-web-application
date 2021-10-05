<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('ws_id');
            $table->string('file_1');
            $table->string('file_2')->nullable();
            $table->string('file_3')->nullable();
            $table->enum('status_p', ['Menunggu Verifikasi', 'Ditolak', 'Diterima'])->default('Menunggu Verifikasi');
            $table->text('message')->nullable();
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
        Schema::dropIfExists('submissions');
    }
}