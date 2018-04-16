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
            /*用户表*/
            $table->increments('id');
            $table->string('username',50)->unique();
            $table->string('password',50);
            $table->string('mail',30)->nullable()->comment('邮箱地址');
            $table->string('qq',15)->nullable()->comment('qq号');
            $table->string('phone',15)->nullable();
            $table->string('register_ip',50)->nullable()->comment('注册ip');
            $table->Integer('register_time')->nullable()->comment('注册时间');
            $table->string('last_login_ip',50)->nullable()->comment('上次登录ip');
            $table->Integer('last_login_time')->nullable()->comment('上次登录时间');
            $table->string('current_login_ip',50)->nullable()->comment('当前登录ip');
            $table->Integer('current_login_time')->nullable()->comment('当前登录ip');
            $table->Integer('login_count')->nullable()->comment('登录次数');
            $table->tinyInteger('status')->default(1)->comment('-1 已删除； 0 账号冻结； 1 正常；');
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
