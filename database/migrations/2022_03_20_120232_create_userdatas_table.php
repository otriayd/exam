<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		  Schema::enableForeignKeyConstraints();
        Schema::create('userdatas', function (Blueprint $table) {
            $table->increments('id');
				$table->integer('status')->default(0);
				$table->string('name')->nullable();
				$table->string('avatar')->default('img/demo/avatars/avatar-m.png');
				$table->string('position')->nullable();
				$table->string('phone')->nullable();
				$table->string('address')->nullable();
				$table->string('vk')->nullable();
				$table->string('telegram')->nullable();
				$table->string('instagram')->nullable();
            $table->timestamps();
        });

		  Schema::table('userdatas', function (Blueprint $table) {
			   $table->unsignedInteger('user_id');
			   $table->foreign('user_id')
                  ->references('id')->on('users')
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
        Schema::dropIfExists('userdatas');
    }
}