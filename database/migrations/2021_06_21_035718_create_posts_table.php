 <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('detail');
            $table->string('title');
            $table->unsignedBigInteger('module_id');
            $table->string('status');
            $table->string('type');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('module_id')
            ->references('id')
            ->on('modules');
        });

        // Schema::create('post_user', function (Blueprint $table) {
        //     $table->primary(['user_id', 'post_id']);
        //     $table->unsignedBigInteger('user_id');
        //     $table->unsignedBigInteger('post_id');
        //     $table->string('title');
        //     $table->text('detail');
        //     $table->timestamps();

        //     $table->foreign('user_id')
        //         ->references('id')
        //         ->on('users')
        //         ->onDelete('cascade');

        //     $table->foreign('post_id')
        //         ->references('id')
        //         ->on('post')
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
