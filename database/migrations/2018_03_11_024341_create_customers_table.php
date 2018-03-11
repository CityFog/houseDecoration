<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('password',80);
            $table->string('mail',30)->nullable();
            $table->string('qq',15)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('group_ids')->nullable();
            $table->string('last_ip',50)->nullable();
            $table->Integer('last_login_time')->nullable();
            $table->string('current_ip',50)->nullable();
            $table->Integer('current_login_time')->nullable();
            $table->Integer('created_at');
            $table->Integer('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
