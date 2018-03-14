<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups_menus', function (Blueprint $table) {
            /*用户组与菜单关联表*/
            $table->increments('id');
            $table->Integer('group_id')->comment('用户组id');
            $table->Integer('menu_id')->comment('菜单id');
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
        Schema::dropIfExists('groups_menus');
    }
}
