<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbl1601EsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql2')->create('tbl_1601_es', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('form_no');
            $table->integer('company_id');
            $table->string('item1A');
            $table->string('item1B');
            $table->string('item2');
            $table->string('item3');
            $table->string('item4')->nullable();
            $table->string('item12')->nullable();
            $table->string('item13')->nullable();
            $table->string('item13A')->nullable();
            $table->text('item14');
            $table->text('item15A');
            $table->text('item15B');
            $table->text('item15C');
            $table->text('item16');
            $table->text('item17A');
            $table->text('item17B');
            $table->text('item17C');
            $table->text('item17D');
            $table->text('item18');
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
        Schema::dropIfExists('tbl_1601_es');
    }
}
