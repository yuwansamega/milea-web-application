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
            $table->int('user_id')->nullable();
            $table->string('fullname')->nullable();
            $table->string('image')->default('user.png');
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->enum('status', ['-', 'PNS', 'CPNS', 'Lainnya'])->nullable()->default('-');
            $table->enum('gender', ['-', 'Laki-Laki', 'Perempuan'])->nullable()->default('-');
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->enum('religion', ['-', 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'])->nullable()->default('-');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('edu')->nullable();
            $table->string('level')->nullable();
            $table->string('position')->nullable();
            $table->string('institute')->nullable();
            $table->text('institute_addr')->nullable();
            $table->string('institute_phone')->nullable();
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