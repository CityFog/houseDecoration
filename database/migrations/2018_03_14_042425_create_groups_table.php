<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            /*'用户组表'*/
            $table->increments('id');
            $table->string('name',50)->comment('用户组名称');
            $table->string('description',100)->nullable()->comment('用户组描述');
            $table->tinyInteger('status')->comment('用户组状态：1 正常; 0 禁用');
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
        Schema::dropIfExists('groups');
    }
}
