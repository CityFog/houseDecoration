<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',50)->comment('菜单描述');
            $table->string('url',100)->comment('菜单链接url');
            $table->Integer('sort')->comment('菜单排序，越大越靠前');
            $table->tinyInteger('hide')->comment('是否显示，1：隐藏；0：显示');
            $table->Integer('fid')->comment('父级菜单ID');
            $table->string('icon',100)->nullable()->comment('菜单icon');
            $table->tinyInteger('status')->default(1)->comment('是否有效，1：有效；0：无效');
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
        Schema::dropIfExists('menus');
    }
}
