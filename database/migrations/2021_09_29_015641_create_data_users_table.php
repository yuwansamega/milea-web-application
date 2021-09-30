<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('image');
            $table->string('nip');
            $table->string('nik')->unique();
            $table->enum('status', ['PNS', 'CPNS', 'Lainnya']);
            $table->enum('gender', ['Laki-Laki', 'Perempuan']);
            $table->string('birth_place');
            $table->date('birth_date');
            $table->text('address');
            $table->enum('religion', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);
            $table->string('email');
            $table->string('phone');
            $table->enum('edu_level', ['SMA Sederajat', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('level')->nullable();
            $table->string('position')->nullable();
            $table->string('institue')->nullable();
            $table->text('institue_addr')->nullable();
            $table->string('institue_phone')->nullable();
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
        Schema::dropIfExists('data_users');
    }
}