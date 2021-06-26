<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('modules');
            $table->enum('group_type', ['post', 'mentor', 'module group', 'study buddy']);
            $table->unsignedBigInteger('respective_id')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();
        });

        Schema::create('group_user', function (Blueprint $table) {
            $table->primary(['group_id', 'user_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
