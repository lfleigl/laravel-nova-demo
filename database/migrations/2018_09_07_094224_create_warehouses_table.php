<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->increments('warehouse_id');
            $table->string('name');
            $table->integer('dep_id')->unsigned();
            $table->foreign('dep_id')->references('department_id')->on('departments');
            $table->index(['dep_id']);
            $table->integer('comp_id')->unsigned();
            $table->foreign('comp_id')->references('company_id')->on('companies');
            $table->index(['comp_id']);
            $table->integer('loc_id')->unsigned();
            $table->foreign('loc_id')->references('location_id')->on('locations');
            $table->index(['loc_id']);

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
        Schema::dropIfExists('warehouses');
    }
}
