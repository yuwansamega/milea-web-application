<?php
 use Illuminate\Support\Facades\DB;
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
            $table->integer('user_id')->nullable();
            $table->string('fullname')->nullable();
            $table->string('image')->nullable()->default('user.png');
            $table->string('nip')->nullable()->default('');
            $table->string('nik')->nullable()->default('');
            $table->enum('status', ['-', 'PNS', 'CPNS', 'Lainnya'])->nullable()->default('-');
            $table->enum('gender', ['-', 'Laki-Laki', 'Perempuan'])->nullable()->default('-');
            $table->string('birth_place')->nullable()->default('');
            $table->date('birth_date')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('address')->nullable()->default('');
            $table->enum('religion', ['-', 'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'])->nullable()->default('-');
            $table->string('email')->nullable()->default('');
            $table->string('phone')->nullable()->default('');
            $table->string('edu')->nullable()->default('');
            $table->string('level')->nullable()->default('');
            $table->string('position')->nullable()->default('');
            $table->string('institute')->nullable()->default('');
            $table->text('institute_addr')->nullable()->default('');
            $table->string('institute_phone')->nullable()->default('');
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