<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbl1601ESchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tbl_1601_e_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_id');
            $table->text('atc');
            $table->text('description');
            $table->text('tax_base')->nullable();
            $table->text('rate');
            $table->text('withheld');
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
        Schema::dropIfExists('tbl_1601_e_schedules');
    }
}
