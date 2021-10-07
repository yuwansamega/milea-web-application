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
            // $table->enum('status', ['Pendaftaran Masih Dibuka', 'Pendaftaran Telah Ditutup'])->nullable();
            $table->date('open_regist')->nullable();
            $table->date('close_regist')->nullable();
            $table->date('open_ws')->nullable();
            $table->date('close_ws')->nullable();
            $table->text('title')->nullable();
            $table->mediumText('describe')->nullable();
            $table->string('place')->nullable();
            $table->integer('quota')->nullable();
            $table->text('cp')->nullable();
            $table->text('criteria')->nullable();
            $table->string('label_upload_1')->nullable(); //From user diupload oleh user
            $table->string('label_upload_2')->nullable();
            $table->string('label_upload_3')->nullable();
            $table->enum('label_unduh_1', ['-'])->nullable()->default('-'); //From admin diunduh oleh user
            $table->enum('label_unduh_2', ['-'])->nullable()->default('-');
            $table->string('label_unduh_3')->nullable();
            $table->string('label_unduh_4')->nullable();
            $table->string('file_unduh_3')->nullable();
            $table->string('file_unduh_4')->nullable();
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