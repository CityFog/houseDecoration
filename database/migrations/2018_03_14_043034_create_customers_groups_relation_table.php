<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersGroupsRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_groups_relation', function (Blueprint $table) {
            /*用户与用户组关联表*/
            $table->increments('id');
            $table->Integer('customer_id')->comment('用户id');
            $table->Integer('group_id')->comment('用户组id');
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
        Schema::dropIfExists('customers_groups_relation');
    }
}
