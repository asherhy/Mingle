<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('avatar')->default('https://nrvfljdhloum.compat.objectstorage.ap-tokyo-1.oraclecloud.com/mingle-bucket/images/default-dp.png');
            $table->string('password');
            $table->string('telegram')->nullable();
            $table->string('matric_year')->nullable();
            $table->enum('status', ['Available', 'Unavailable'])->default('Unavailable');  
            $table->string('position')->nullable();
            $table->text('detail')->nullable();
            $table->string('gender')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
