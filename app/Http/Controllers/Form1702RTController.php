<?php

namespace App\Http\Controllers;

use App\Xml;
use App\Companies;
use App\tbl_1702RT_1;
use App\tbl_1702RT_2;
use App\tbl_1702RT_3;
use App\tbl_1702RT_4;
use App\tbl_1702RT_5;
use App\tbl_1702RT_6;
use App\tbl_1702RT_7;
use App\tbl_1702RT_8;
use App\tbl_1702RT_schedule3;
use App\tbl_1702RT_schedule4;
use App\tbl_1702RT_schedule4_others;
use App\tbl_1702RT_schedule5;
use App\tbl_1702RT_schedule7;
use App\tbl_1702RT_schedule9_3;
use App\tbl_1702RT_schedule9_6;
use App\tbl_1702RT_schedule9_8;
use App\tbl_1702RT_schedule12_1;
use App\tbl_1702RT_schedule12_2;
use App\tbl_1702RT_schedule12_3;
use App\tbl_1702RT_schedule12_4;
use App\tbl_1702RT_schedule13_1;
use App\tbl_1702RT_schedule13_2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class Form1702RTController extends Controller
{
    public function index($company,$action,$form_id)
    {
    	$company = Companies::find($company);

    	\Config::set('database.connections.mysql2.database',Auth::user()->database_name);

        if($action == 'new'){
        	if(DB::connection('mysql2')->getSchemaBuilder()->hasTable('tbl_1702_r_t_1s')){

            }else{
                Schema::connection('mysql2')->create('tbl_1702_r_t_1s', function (Blueprint $table) {
                     $table->increments('id');
                     $table->integer('form_no');
					 $table->integer('company_id'); 
					 $table->string('item1');
					 $table->string('item2A');
					 $table->string('item2B');
					 $table->string('item3');
					 $table->string('item4');
					 $table->string('item5_other')->nullable();
					 $table->string('item5_atc');
					 $table->string('item8')->nullable();
					 $table->string('item14')->nullable();
					 $table->string('item15');
					 $table->text('item16');
					 $table->text('item17');
					 $table->text('item18');
					 $table->text('item19');
					 $table->text('item20');
					 $table->text('item21_refund')->nullable();
					 $table->text('item21_certificate')->nullable();
					 $table->text('item21_carried')->nullable();
					 $table->text('item22')->nullable();
					 $table->text('item22_no')->nullable();
					 $table->text('item23')->nullable();
					 $table->text('item24')->nullable();
					 $table->text('item25')->nullable();
					 $table->text('item26A')->nullable();
					 $table->text('item26B')->nullable();
					 $table->text('item26C')->nullable();
					 $table->text('item26D')->nullable();
					 $table->text('item27A')->nullable();
					 $table->text('item27B')->nullable();
					 $table->text('item27C')->nullable();
					 $table->text('item27D')->nullable();
					 $table->text('item28A')->nullable();
					 $table->text('item28B')->nullable();
					 $table->text('item28C')->nullable();
					 $table->text('item29A')->nullable();
					 $table->text('item29B')->nullable();
					 $table->text('item29C')->nullable();
					 $table->text('item29D')->nullable();
					 $table->text('item29E')->nullable();
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_2s', function (Blueprint $table) {
                	 $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item30');
					 $table->text('item31');
					 $table->text('item32');
					 $table->text('item33');
					 $table->text('item34');
					 $table->text('item35');
					 $table->text('item36');
					 $table->text('item37');
					 $table->text('item38');
					 $table->text('item39');
					 $table->text('item40');
					 $table->text('item42');
					 $table->text('item43');
					 $table->text('item44');
					 $table->text('item45');
					 $table->text('item46');
					 $table->text('item47');
					 $table->text('item48');
					 $table->text('item49');
					 $table->text('item50');
					 $table->text('item51');
					 $table->text('item52');
					 $table->text('item53');
					 $table->text('item54');
					 $table->text('item55')->nullable();
					 $table->text('item56A')->nullable();
					 $table->text('item56B')->nullable();
					 $table->text('item56C')->nullable();
					 $table->text('item56D')->nullable();
					 $table->text('item57')->nullable();
					 $table->text('item58A')->nullable();
					 $table->text('item58B')->nullable();
					 $table->text('item58C')->nullable();
					 $table->text('item58D')->nullable();
					 $table->text('item59A')->nullable();
					 $table->text('item59B')->nullable();
					 $table->text('item59C')->nullable();
					 $table->text('item59D')->nullable();
					 $table->text('item60')->nullable();
					 $table->text('item61')->nullable();
					 $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
					 $table->text('item_1_1');
					 $table->text('item_1_2');
					 $table->text('item_1_3');
					 $table->text('item_1_4');
					 $table->text('item_1_5');
					 $table->text('item_1_6');
					 $table->text('item_2_1');
					 $table->text('item_2_2');
					 $table->text('item_2_3');
					 $table->text('item_2_4');
					 $table->text('item_2_5');
					 $table->text('item_2B_6');
					 $table->text('item_2B_7');
					 $table->text('item_2B_8');
					 $table->text('item_2B_9');
					 $table->text('item_2B_10');
					 $table->text('item_2B_11');
					 $table->text('item_2B_12');
					 $table->text('item_2B_13');
					 $table->text('item_2B_14');
					 $table->text('item_2B_15');
					 $table->text('item_2B_16');
					 $table->text('item_2B_17');
					 $table->text('item_2B_18');
					 $table->text('item_2B_19');
					 $table->text('item_2C_20');
					 $table->text('item_2C_21');
					 $table->text('item_2C_22');
					 $table->text('item_2C_23');
					 $table->text('item_2C_24');
					 $table->text('item_2C_25');
					 $table->text('item_2C_26');
					 $table->text('item_2C_27');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_4s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_sched3_1A')->nullable();
                	 $table->text('item_sched3_1B');
                	 $table->text('item_sched3_2A')->nullable();
                	 $table->text('item_sched3_2B');
                	 $table->text('item_sched3_3A')->nullable();
                	 $table->text('item_sched3_3B');
					 $table->text('item_sched3_4');
					 $table->text('item_sched4_1');
					 $table->text('item_sched4_2A')->nullable();
					 $table->text('item_sched4_2B');
					 $table->text('item_sched4_3A')->nullable();
					 $table->text('item_sched4_3B');
					 $table->text('item_sched4_4A')->nullable();
					 $table->text('item_sched4_4B');
					 $table->text('item_sched4_5');
					 $table->text('item_sched4_6');
					 $table->text('item_sched4_7');
					 $table->text('item_sched4_8');
					 $table->text('item_sched4_9');
					 $table->text('item_sched4_10');
					 $table->text('item_sched4_11');
					 $table->text('item_sched4_12');
					 $table->text('item_sched4_13');
					 $table->text('item_sched4_14');
					 $table->text('item_sched4_15');
					 $table->text('item_sched4_16');
					 $table->text('item_sched4_17');
					 $table->text('item_sched4_18');
					 $table->text('item_sched4_19');
					 $table->text('item_sched4_20');
					 $table->text('item_sched4_21');
					 $table->text('item_sched4_22');
					 $table->text('item_sched4_23');
					 $table->text('item_sched4_24');
					 $table->text('item_sched4_25');
					 $table->text('item_sched4_26');
					 $table->text('item_sched4_27');
					 $table->text('item_sched4_28');
					 $table->text('item_sched4_29');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule4s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_5s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
					 $table->text('item_sched4_30');
					 $table->text('item_sched4_31');
					 $table->text('item_sched4_32');
					 $table->text('item_sched4_33');
					 $table->text('item_sched4_34');
					 $table->text('item_sched4_35');
					 $table->text('item_sched4_36A')->nullable();
					 $table->text('item_sched4_36B');
					 $table->text('item_sched4_37A')->nullable();
					 $table->text('item_sched4_37B');
					 $table->text('item_sched4_38A')->nullable();
					 $table->text('item_sched4_38B');
					 $table->text('item_sched4_39A')->nullable();
					 $table->text('item_sched4_39B');
					 $table->text('item_sched4_40');
					 $table->text('item_sched5_1A')->nullable();
					 $table->text('item_sched5_1B')->nullable();
					 $table->text('item_sched5_1C');
					 $table->text('item_sched5_2A')->nullable();
					 $table->text('item_sched5_2B')->nullable();
					 $table->text('item_sched5_2C');
					 $table->text('item_sched5_3A')->nullable();
					 $table->text('item_sched5_3B')->nullable();
					 $table->text('item_sched5_3C');
					 $table->text('item_sched5_4A')->nullable();
					 $table->text('item_sched5_4B')->nullable();
					 $table->text('item_sched5_4C');
					 $table->text('item_sched5_5');
					 $table->text('item_sched6_1');
					 $table->text('item_sched6_2');
					 $table->text('item_sched6_3');
					 $table->text('item_sched6A_4_year')->nullable();
					 $table->text('item_sched6A_4A');
					 $table->text('item_sched6A_4B');
					 $table->text('item_sched6A_4C');
					 $table->text('item_sched6A_4D');
					 $table->text('item_sched6A_4E');
					 $table->text('item_sched6A_5_year')->nullable();
					 $table->text('item_sched6A_5A');
					 $table->text('item_sched6A_5B');
					 $table->text('item_sched6A_5C');
					 $table->text('item_sched6A_5D');
					 $table->text('item_sched6A_5E');
					 $table->text('item_sched6A_6_year')->nullable();
					 $table->text('item_sched6A_6A');
					 $table->text('item_sched6A_6B');
					 $table->text('item_sched6A_6C');
					 $table->text('item_sched6A_6D');
					 $table->text('item_sched6A_6E');
					 $table->text('item_sched6A_7_year')->nullable();
					 $table->text('item_sched6A_7A');
					 $table->text('item_sched6A_7B');
					 $table->text('item_sched6A_7C');
					 $table->text('item_sched6A_7D');
					 $table->text('item_sched6A_7E');
					 $table->text('item_sched6A_8');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule4_others', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule5s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('legal_basis');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_6s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
					 $table->text('item_sched7_1');
					 $table->text('item_sched7_2');
					 $table->text('item_sched7_3');
					 $table->text('item_sched7_4');
					 $table->text('item_sched7_5');
					 $table->text('item_sched7_6');
					 $table->text('item_sched7_7');
					 $table->text('item_sched7_8');
					 $table->text('item_sched7_9');
					 $table->text('item_sched7_10A')->nullable();
					 $table->text('item_sched7_10B');
					 $table->text('item_sched7_11A')->nullable();
					 $table->text('item_sched7_11B');
					 $table->text('item_sched7_12');
					 $table->text('item_sched8_1_year')->nullable();
					 $table->text('item_sched8_1A');
					 $table->text('item_sched8_1B');
					 $table->text('item_sched8_1C');
					 $table->text('item_sched8_1D');
					 $table->text('item_sched8_1E');
					 $table->text('item_sched8_1F');
					 $table->text('item_sched8_1G');
					 $table->text('item_sched8_2_year')->nullable();
					 $table->text('item_sched8_2A');
					 $table->text('item_sched8_2B');
					 $table->text('item_sched8_2C');
					 $table->text('item_sched8_2D');
					 $table->text('item_sched8_2E');
					 $table->text('item_sched8_2F');
					 $table->text('item_sched8_2G');
					 $table->text('item_sched8_3_year')->nullable();
					 $table->text('item_sched8_3A');
					 $table->text('item_sched8_3B');
					 $table->text('item_sched8_3C');
					 $table->text('item_sched8_3D');
					 $table->text('item_sched8_3E');
					 $table->text('item_sched8_3F');
					 $table->text('item_sched8_3G');
					 $table->text('item_sched8_4');
					 $table->text('item_sched9_1');
					 $table->text('item_sched9_2A')->nullable();
					 $table->text('item_sched9_2B');
					 $table->text('item_sched9_3A')->nullable();
					 $table->text('item_sched9_3B');
					 $table->text('item_sched9_4');
					 $table->text('item_sched9_5A')->nullable();
					 $table->text('item_sched9_5B');
					 $table->text('item_sched9_6A')->nullable();
					 $table->text('item_sched9_6B');
					 $table->text('item_sched9_7A')->nullable();
					 $table->text('item_sched9_7B');
					 $table->text('item_sched9_8A')->nullable();
					 $table->text('item_sched9_8B');
					 $table->text('item_sched9_9');
					 $table->text('item_sched9_10');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule7s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule9_3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule9_6s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule9_8s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item_no');
					 $table->text('description');
					 $table->text('amount');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_7s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
					 $table->text('item_sched10_1');
					 $table->text('item_sched10_2');
					 $table->text('item_sched10_3');
					 $table->text('item_sched10_4');
					 $table->text('item_sched10_5');
					 $table->text('item_sched10_6');
					 $table->text('item_sched10_7');
					 $table->text('item_sched10_8');
					 $table->text('item_sched10_9');
					 $table->text('item_sched10_10');
					 $table->text('item_sched10_11');
					 $table->text('item_sched10_12');
					 $table->text('item_sched10_13');
					 $table->text('item_sched10_14');
					 $table->text('item_sched10_15');
					 $table->text('item_sched10_16');
					 $table->text('item_sched10_17');
					 $table->text('item_sched11_stock')->nullable();
					 $table->text('item_sched11_partners')->nullable();
					 $table->text('item_sched11_members')->nullable();
					 $table->text('item_sched11_name1')->nullable();
					 $table->text('item_sched11_tin1A')->nullable();
					 $table->text('item_sched11_tin1B')->nullable();
					 $table->text('item_sched11_tin1C')->nullable();
					 $table->text('item_sched11_tin1D')->nullable();
					 $table->text('item_sched11_capital1');
					 $table->text('item_sched11_total1');
					 $table->text('item_sched11_name2')->nullable();
					 $table->text('item_sched11_tin2A')->nullable();
					 $table->text('item_sched11_tin2B')->nullable();
					 $table->text('item_sched11_tin2C')->nullable();
					 $table->text('item_sched11_tin2D')->nullable();
					 $table->text('item_sched11_capital2');
					 $table->text('item_sched11_total2');
					 $table->text('item_sched11_name3')->nullable();
					 $table->text('item_sched11_tin3A')->nullable();
					 $table->text('item_sched11_tin3B')->nullable();
					 $table->text('item_sched11_tin3C')->nullable();
					 $table->text('item_sched11_tin3D')->nullable();
					 $table->text('item_sched11_capital3');
					 $table->text('item_sched11_total3');
					 $table->text('item_sched11_name4')->nullable();
					 $table->text('item_sched11_tin4A')->nullable();
					 $table->text('item_sched11_tin4B')->nullable();
					 $table->text('item_sched11_tin4C')->nullable();
					 $table->text('item_sched11_tin4D')->nullable();
					 $table->text('item_sched11_capital4');
					 $table->text('item_sched11_total4');
					 $table->text('item_sched11_name5')->nullable();
					 $table->text('item_sched11_tin5A')->nullable();
					 $table->text('item_sched11_tin5B')->nullable();
					 $table->text('item_sched11_tin5C')->nullable();
					 $table->text('item_sched11_tin5D')->nullable();
					 $table->text('item_sched11_capital5');
					 $table->text('item_sched11_total5');
					 $table->text('item_sched11_name6')->nullable();
					 $table->text('item_sched11_tin6A')->nullable();
					 $table->text('item_sched11_tin6B')->nullable();
					 $table->text('item_sched11_tin6C')->nullable();
					 $table->text('item_sched11_tin6D')->nullable();
					 $table->text('item_sched11_capital6');
					 $table->text('item_sched11_total6');
					 $table->text('item_sched11_name7')->nullable();
					 $table->text('item_sched11_tin7A')->nullable();
					 $table->text('item_sched11_tin7B')->nullable();
					 $table->text('item_sched11_tin7C')->nullable();
					 $table->text('item_sched11_tin7D')->nullable();
					 $table->text('item_sched11_capital7');
					 $table->text('item_sched11_total7');
					 $table->text('item_sched11_name8')->nullable();
					 $table->text('item_sched11_tin8A')->nullable();
					 $table->text('item_sched11_tin8B')->nullable();
					 $table->text('item_sched11_tin8C')->nullable();
					 $table->text('item_sched11_tin8D')->nullable();
					 $table->text('item_sched11_capital8');
					 $table->text('item_sched11_total8');
					 $table->text('item_sched11_name9')->nullable();
					 $table->text('item_sched11_tin9A')->nullable();
					 $table->text('item_sched11_tin9B')->nullable();
					 $table->text('item_sched11_tin9C')->nullable();
					 $table->text('item_sched11_tin9D')->nullable();
					 $table->text('item_sched11_capital9');
					 $table->text('item_sched11_total9');
					 $table->text('item_sched11_name10')->nullable();
					 $table->text('item_sched11_tin10A')->nullable();
					 $table->text('item_sched11_tin10B')->nullable();
					 $table->text('item_sched11_tin10C')->nullable();
					 $table->text('item_sched11_tin10D')->nullable();
					 $table->text('item_sched11_capital10');
					 $table->text('item_sched11_total10');
					 $table->text('item_sched11_name11')->nullable();
					 $table->text('item_sched11_tin11A')->nullable();
					 $table->text('item_sched11_tin11B')->nullable();
					 $table->text('item_sched11_tin11C')->nullable();
					 $table->text('item_sched11_tin11D')->nullable();
					 $table->text('item_sched11_capital11');
					 $table->text('item_sched11_total11');
					 $table->text('item_sched11_name12')->nullable();
					 $table->text('item_sched11_tin12A')->nullable();
					 $table->text('item_sched11_tin12B')->nullable();
					 $table->text('item_sched11_tin12C')->nullable();
					 $table->text('item_sched11_tin12D')->nullable();
					 $table->text('item_sched11_capital12');
					 $table->text('item_sched11_total12');
					 $table->text('item_sched11_name13')->nullable();
					 $table->text('item_sched11_tin13A')->nullable();
					 $table->text('item_sched11_tin13B')->nullable();
					 $table->text('item_sched11_tin13C')->nullable();
					 $table->text('item_sched11_tin13D')->nullable();
					 $table->text('item_sched11_capital13');
					 $table->text('item_sched11_total13');
					 $table->text('item_sched11_name14')->nullable();
					 $table->text('item_sched11_tin14A')->nullable();
					 $table->text('item_sched11_tin14B')->nullable();
					 $table->text('item_sched11_tin14C')->nullable();
					 $table->text('item_sched11_tin14D')->nullable();
					 $table->text('item_sched11_capital14');
					 $table->text('item_sched11_total14');
					 $table->text('item_sched11_name15')->nullable();
					 $table->text('item_sched11_tin15A')->nullable();
					 $table->text('item_sched11_tin15B')->nullable();
					 $table->text('item_sched11_tin15C')->nullable();
					 $table->text('item_sched11_tin15D')->nullable();
					 $table->text('item_sched11_capital15');
					 $table->text('item_sched11_total15');
					 $table->text('item_sched11_name16')->nullable();
					 $table->text('item_sched11_tin16A')->nullable();
					 $table->text('item_sched11_tin16B')->nullable();
					 $table->text('item_sched11_tin16C')->nullable();
					 $table->text('item_sched11_tin16D')->nullable();
					 $table->text('item_sched11_capital16');
					 $table->text('item_sched11_total16');
					 $table->text('item_sched11_name17')->nullable();
					 $table->text('item_sched11_tin17A')->nullable();
					 $table->text('item_sched11_tin17B')->nullable();
					 $table->text('item_sched11_tin17C')->nullable();
					 $table->text('item_sched11_tin17D')->nullable();
					 $table->text('item_sched11_capital17');
					 $table->text('item_sched11_total17');
					 $table->text('item_sched11_name18')->nullable();
					 $table->text('item_sched11_tin18A')->nullable();
					 $table->text('item_sched11_tin18B')->nullable();
					 $table->text('item_sched11_tin18C')->nullable();
					 $table->text('item_sched11_tin18D')->nullable();
					 $table->text('item_sched11_capital18');
					 $table->text('item_sched11_total18');
					 $table->text('item_sched11_name19')->nullable();
					 $table->text('item_sched11_tin19A')->nullable();
					 $table->text('item_sched11_tin19B')->nullable();
					 $table->text('item_sched11_tin19C')->nullable();
					 $table->text('item_sched11_tin19D')->nullable();
					 $table->text('item_sched11_capital19');
					 $table->text('item_sched11_total19');
					 $table->text('item_sched11_name20')->nullable();
					 $table->text('item_sched11_tin20A')->nullable();
					 $table->text('item_sched11_tin20B')->nullable();
					 $table->text('item_sched11_tin20C')->nullable();
					 $table->text('item_sched11_tin20D')->nullable();
					 $table->text('item_sched11_capital20');
					 $table->text('item_sched11_total20');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_8s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
					 $table->text('item_sched12_1A');
					 $table->text('item_sched12_1B');
					 $table->text('item_sched12_1C');
					 $table->text('item_sched12_2A');
					 $table->text('item_sched12_2B');
					 $table->text('item_sched12_2C');
					 $table->text('item_sched12_3A');
					 $table->text('item_sched12_3B');
					 $table->text('item_sched12_3C');
					 $table->text('item_sched12_4A');
					 $table->text('item_sched12_4B');
					 $table->text('item_sched12_4C');
					 $table->text('item_sched12_4_other_total');
					 $table->text('item_sched12_5A')->nullable();
					 $table->text('item_sched12_5B')->nullable();
					 $table->text('item_sched12_6A')->nullable();
					 $table->text('item_sched12_6B')->nullable();
					 $table->text('item_sched12_7A')->nullable();
					 $table->text('item_sched12_7B')->nullable();
					 $table->text('item_sched12_8A');
					 $table->text('item_sched12_8B');
					 $table->text('item_sched12_9A');
					 $table->text('item_sched12_9B');
					 $table->text('item_sched12_10A_type')->nullable();
					 $table->text('item_sched12_10A_stock')->nullable();
					 $table->text('item_sched12_10B_type')->nullable();
					 $table->text('item_sched12_10B_stock')->nullable();
					 $table->text('item_sched12_11A')->nullable();
					 $table->text('item_sched12_11B')->nullable();
					 $table->text('item_sched12_12A');
					 $table->text('item_sched12_12B');
					 $table->text('item_sched12_13A')->nullable();
					 $table->text('item_sched12_13B')->nullable();
					 $table->text('item_sched12_14A');
					 $table->text('item_sched12_14B');
					 $table->text('item_sched12_15A');
					 $table->text('item_sched12_15B');
					 $table->text('item_sched12_16A')->nullable();
					 $table->text('item_sched12_16B')->nullable();
					 $table->text('item_sched12_17A');
					 $table->text('item_sched12_17B');
					 $table->text('item_sched12_18A');
					 $table->text('item_sched12_18B');
					 $table->text('item_sched12_19');
					 $table->text('item_sched13_1');
					 $table->text('item_sched13_2A')->nullable();
					 $table->text('item_sched13_2B')->nullable();
					 $table->text('item_sched13_3A')->nullable();
					 $table->text('item_sched13_3B')->nullable();
					 $table->text('item_sched13_4A')->nullable();
					 $table->text('item_sched13_4B')->nullable();
					 $table->text('item_sched13_5A');
					 $table->text('item_sched13_5B');
					 $table->text('item_sched13_6A')->nullable();
					 $table->text('item_sched13_6B')->nullable();
					 $table->text('item_sched13_7A');
					 $table->text('item_sched13_7B');
					 $table->text('item_sched13_8');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule12_1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('income')->nullable();
					 $table->text('itemA');
					 $table->text('itemB');
					 $table->text('itemC');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule12_2s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item5C')->nullable();
                	 $table->text('item5D')->nullable();
                	 $table->text('item6C')->nullable();
                	 $table->text('item6D')->nullable();
                	 $table->text('item7C')->nullable();
                	 $table->text('item7D')->nullable();
					 $table->text('item8A');
					 $table->text('item8B');
					 $table->text('item9A');
					 $table->text('item9B');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule12_3s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item10C_type')->nullable();
                	 $table->text('item10C_stock')->nullable();
                	 $table->text('item10D_type')->nullable();
                	 $table->text('item10D_stock')->nullable();
                	 $table->text('item11C')->nullable();
                	 $table->text('item11D')->nullable();
                	 $table->text('item12C');
                	 $table->text('item12D');
                	 $table->text('item13C')->nullable();
                	 $table->text('item13D')->nullable();
                	 $table->text('item14C');
                	 $table->text('item14D');
                	 $table->text('item15C');
                	 $table->text('item15D');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule12_4s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item16C')->nullable();
                	 $table->text('item16D')->nullable();
                	 $table->text('item17C');
                	 $table->text('item17D');
                	 $table->text('item18C');
                	 $table->text('item18D');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule13_1s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item2C')->nullable();
                	 $table->text('item2D')->nullable();
                	 $table->text('item3C')->nullable();
                	 $table->text('item3D')->nullable();
                	 $table->text('item4C')->nullable();
                	 $table->text('item4D')->nullable();
                	 $table->text('item5C');
                	 $table->text('item5D');
                     $table->timestamps();
                });

                Schema::connection('mysql2')->create('tbl_1702_r_t_schedule13_2s', function (Blueprint $table) {
                     $table->increments('id');
                	 $table->integer('form_id');
                	 $table->text('item6C')->nullable();
                	 $table->text('item6D')->nullable();
                	 $table->text('item7C');
                	 $table->text('item7D');
                     $table->timestamps();
                });

            }
            return view('forms.BIR-Form 1702RT',['company' => $company, 'form_no' => $form_id, 'action' => $action]);
        }else{
        	$data = tbl_1702RT_1::find($form_id);
        	$xml = Xml::where('user_id', Auth::user()->id)
     						->where('company_id', $company->id)
     						->where('form_id', $form_id)
     						->where('form', '1702RT')
     						->get();
        	return view('forms.BIR-Form 1702RT',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
        }
    }

    public function store(){
    	config(['database.connections.mysql2.database' => Auth::user()->database_name]);

    	$data1 = ([
				'form_no'		=> request('form_no'),
				'company_id'	=> request('company'),
				'item1'			=> request('frm1702RT:rdoPg1I1'),
				'item2A'		=> request('frm1702RT:ddlPg1I2Month'),
				'item2B'		=> request('frm1702RT:txtPg1I2Year'),
				'item3'			=> request('frm1702RT:rdoPg1I2Ammend'),
				'item4'			=> request('frm1702RT:rdoPg1I4ShortPeriod'),
				'item5_other'	=> request('frm1702RT:rdoPg1I5Atc_Other'),
				'item5_atc'	    => request('frm1702RT:drpPg1I5AtcOther'),
				'item8'			=> null !== request('frm1702RT:Month') ? request('frm1702RT:Month') : '',
				'item14'		=> request('frm1702RT:txtPg1Pt1I14PSIC'),
				'item15A'		=> null !== request('frm1702RT:rdoPg1Pt1I15ItemizedDeduction') ? request('frm1702RT:rdoPg1Pt1I15ItemizedDeduction') : '',
				'item15B'		=> null !== request('frm1702RT:rdoPg1Pt1I15OptionalStandard') ? request('frm1702RT:rdoPg1Pt1I15OptionalStandard') : '',
				'item16'		=> request('frm1702RT:txtPg1Pt2I16IncomeTax'),
				'item17'		=> request('frm1702RT:txtPg1Pt2I17TotalTaxCredits'),
				'item18'		=> request('frm1702RT:txtPg1Pt2I18NetTax'),
				'item19'		=> request('frm1702RT:txtPg1Pt2I19TotalPenalties'),
				'item20'		=> request('frm1702RT:txtPg1Pt2I20TotalAmount'),
				'item21_refund' => null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded') ? request('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded') : '',
				'item21_certificate' => null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentIssued') ? request('frm1702RT:rdoPg1Pt2I21OverpaymentIssued') : '',
				'item21_carried'         => null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentCarried') ? request('frm1702RT:rdoPg1Pt2I21OverpaymentCarried') : '',
				'item22'         => null !== request('frm1702RT:rdoPg1Pt2I22') ? request('frm1702RT:rdoPg1Pt2I22') : '',
				'item22_no'		 => request('frm1702RT:txtPg1Pt2I22CTC'),
				'item23'         => request('frm1702RT:txtPg1Pt2I23Date'),
				'item24'         => request('frm1702RT:txtPg1Pt2I24PlaceOfIssue'),
				'item25'         => request('frm1702RT:txtPg1Pt2I25AmountCTC'),
				'item26A'        => request('frm1702RT:txtPg1Pt3I26DebitMemoC1'),
				'item26B'        => request('frm1702RT:txtPg1Pt3I26DebitMemoC2'),
				'item26C'        => request('frm1702RT:txtPg1Pt3I26DebitMemoC3Date'),
				'item26D'        => request('frm1702RT:txtPg1Pt3I26DebitMemoC4Amount'),
				'item27A'        => request('frm1702RT:txtPg1Pt3I27CheckC1'),
				'item27B'        => request('frm1702RT:txtPg1Pt3I27CheckC2'),
				'item27C'        => request('frm1702RT:txtPg1Pt3I27CheckC3Date'),
				'item27D'        => request('frm1702RT:txtPg1Pt3I27CheckC4Amount'),
				'item28A'        => request('frm1702RT:txtPg1Pt3I28TaxDebitC2'),
				'item28B'        => request('frm1702RT:txtPg1Pt3I28TaxDebitDate'),
				'item28C'        => request('frm1702RT:txtPg1Pt3I28TaxDebitC4Amount'),
				'item29A'        => request('frm1702RT:txtPg1Pt3I29Others'),
				'item29B'        => request('frm1702RT:txtPg1Pt3I29OthersC1'),
				'item29C'        => request('frm1702RT:txtPg1Pt3I29OthersC2'),
				'item29D'        => request('frm1702RT:txtPg1Pt3I29OthersC3Date'),
				'item29E'        => request('frm1702RT:txtPg1Pt3I29OthersC4Amount'),
    	]);

    	$getForm = tbl_1702RT_1::where('form_no', request('form_no'))
     						->where('company_id', request('company'))->get();
     	$form = "";
        if(request('form_id') != ""){
            $form = tbl_1702RT_1::find(request('form_id'));
            $form->update($data1);
        }else{
            if($getForm->isEmpty()){
                $form = tbl_1702RT_1::create($data1);
            }else{
                $form = tbl_1702RT_1::find($getForm[0]->id);
                $form->update($data1);
            }
        }

    	$data2 = ([
    			'form_id'        => $form->id,
				'item30'         => request('frm1702RT:txtPg2Pt4I30NetSales'),
				'item31'         => request('frm1702RT:txtPg2Pt4I31LessCost'),
				'item32'         => request('frm1702RT:txtPg2Pt4I32GrossIncome'),
				'item33'         => request('frm1702RT:txtPg2Pt4I33AddOtherTaxable'),
				'item34'         => request('frm1702RT:txtPg2Pt4I34TotalGross'),
				'item35'         => request('frm1702RT:txtPg2Pt4I35OrdinaryAllowable'),
				'item36'         => request('frm1702RT:txtPg2Pt4I36SpecialAllowable'),
				'item37'         => request('frm1702RT:txtPg2Pt4I37Nolco'),
				'item38'         => request('frm1702RT:txtPg2Pt4I38TotalItemized'),
				'item39'         => request('frm1702RT:txtPg2Pt4I39OptionalStandard'),
				'item40'         => request('frm1702RT:txtPg2Pt4I40NetTaxable'),
				'item42'         => request('frm1702RT:txtPg2Pt4I42IncomeTaxDue'),
				'item43'         => request('frm1702RT:txtPg2Pt4I43MinimumCorporate'),
				'item44'         => request('frm1702RT:txtPg2Pt4I44TotalIncomeTax'),
				'item45'         => request('frm1702RT:txtPg2Pt4I45LessTotalTax'),
				'item46'         => request('frm1702RT:txtPg2Pt4I46NetTax'),
				'item47'         => request('frm1702RT:txtPg2Pt4I47Surcharge'),
				'item48'         => request('frm1702RT:txtPg2Pt4I48Interest'),
				'item49'         => request('frm1702RT:txtPg2Pt4I49Compromise'),
				'item50'         => request('frm1702RT:txtPg2Pt4I50TotalPenalties'),
				'item51'         => request('frm1702RT:txtPg2Pt4I51TotalAmount'),
				'item52'         => request('frm1702RT:txtPg2Pt5I52SpecialAllowable'),
				'item53'         => request('frm1702RT:txtPg2Pt5I53AddSpecialTax'),
				'item54'         => request('frm1702RT:txtPg2Pt5I54TotalTax'),
				'item55'         => request('frm1702RT:txtPg2Pt6I55Name'),
				'item56A'        => request('frm1702RT:txtPg2Pt6I56TIN1'),
				'item56B'        => request('frm1702RT:txtPg2Pt6I56TIN2'),
				'item56C'        => request('frm1702RT:txtPg2Pt6I56TIN3'),
				'item56D'        => request('frm1702RT:txtPg2Pt6I56TIN4'),
				'item57'         => request('frm1702RT:txtPg2Pt6I57Name'),
				'item58A'        => request('frm1702RT:txtPg2Pt6I58TIN1'),
				'item58B'        => request('frm1702RT:txtPg2Pt6I58TIN2'),
				'item58C'        => request('frm1702RT:txtPg2Pt6I58TIN3'),
				'item58D'        => request('frm1702RT:txtPg2Pt6I58TIN4'),
				'item59A'        => request('frm1702RT:txtPg2Pt6I59BIR1'),
				'item59B'        => request('frm1702RT:txtPg2Pt6I59BIR2'),
				'item59C'        => request('frm1702RT:txtPg2Pt6I59BIR3'),
				'item59D'        => request('frm1702RT:txtPg2Pt6I59BIR4'),
				'item60'         => request('frm1702RT:txtPg2Pt6I60IssueDate'),
				'item61'         => request('frm1702RT:txtPg2Pt6I61ExpiryDate'),
    	]);

    	if(request('form_id') != ""){
            $page2 = tbl_1702RT_2::find(request('form_id'));
            $page2->update($data2);
        }else{
        	$page2 = tbl_1702RT_2::find($form->id);
            if(empty($page2)){
                tbl_1702RT_2::create($data2);
            }else{
                $page2->update($data2);
            }
        }

    	$data3 = ([
    			'form_id'     => $form->id,
				'item_1_1'     => request('frm1702RT:txtPg3Sc1I1GoodsProp'),
				'item_1_2'     => request('frm1702RT:txtPg3Sc1I2SaleServices'),
				'item_1_3'     => request('frm1702RT:txtPg3Sc1I3LeaseProp'),
				'item_1_4'     => request('frm1702RT:txtPg3Sc1I4Total'),
				'item_1_5'     => request('frm1702RT:txtPg3Sc1I5LessSales'),
				'item_1_6'     => request('frm1702RT:txtPg3Sc1I6NetSales'),
				'item_2_1'     => request('frm1702RT:txtPg3Sc2I1MerchInventory'),
				'item_2_2'     => request('frm1702RT:txtPg3Sc2I2AddPurchases'),
				'item_2_3'     => request('frm1702RT:txtPg3Sc2I3TotalGoods'),
				'item_2_4'     => request('frm1702RT:txtPg3Sc2I4LessMerch'),
				'item_2_5'     => request('frm1702RT:txtPg3Sc2I5CostofSales'),
				'item_2B_6'     => request('frm1702RT:txtPg3Sc2I6DirectMaterials'),
				'item_2B_7'     => request('frm1702RT:txtPg3Sc2I7AddPurchases'),
				'item_2B_8'     => request('frm1702RT:txtPg3Sc2I8MaterialsAvaliable'),
				'item_2B_9'     => request('frm1702RT:txtPg3Sc2I9LessDirectMat'),
				'item_2B_10'     => request('frm1702RT:txtPg3Sc2I10RawMatUsed'),
				'item_2B_11'     => request('frm1702RT:txtPg3Sc2I11DirectLabor'),
				'item_2B_12'     => request('frm1702RT:txtPg3Sc2I12ManOverhead'),
				'item_2B_13'     => request('frm1702RT:txtPg3Sc2I13TotalManCost'),
				'item_2B_14'     => request('frm1702RT:txtPg3Sc2I14WorkProcess'),
				'item_2B_15'     => request('frm1702RT:txtPg3Sc2I15LessWorkProcess'),
				'item_2B_16'     => request('frm1702RT:txtPg3Sc2I16CostOfGoods'),
				'item_2B_17'     => request('frm1702RT:txtPg3Sc2I17FinishedGoods'),
				'item_2B_18'     => request('frm1702RT:txtPg3Sc2I18LessFinishGoods'),
				'item_2B_19'     => request('frm1702RT:txtPg3Sc2I19CostOfGoods'),
				'item_2C_20'     => request('frm1702RT:txtPg3Sc2I20DirectSalaries'),
				'item_2C_21'     => request('frm1702RT:txtPg3Sc2I21DirectMaterials'),
				'item_2C_22'     => request('frm1702RT:txtPg3Sc2I22DirectDepreciation'),
				'item_2C_23'     => request('frm1702RT:txtPg3Sc2I23DirectRental'),
				'item_2C_24'     => request('frm1702RT:txtPg3Sc2I24DirectOutside'),
				'item_2C_25'     => request('frm1702RT:txtPg3Sc2I25DirectOthers'),
				'item_2C_26'     => request('frm1702RT:txtPg3Sc2I26TotalService'),
				'item_2C_27'     => request('frm1702RT:txtPg3Sc2I27TotalSales'),
    	]);

    	if(request('form_id') != ""){
            $page3 = tbl_1702RT_3::find(request('form_id'));
            $page3->update($data3);
        }else{
        	$page3 = tbl_1702RT_3::find($form->id);
            if(empty($page3)){
                tbl_1702RT_3::create($data3);
            }else{
                $page2->update($data3);
            }
        }

    	$data4 = ([
    			'form_id'      => $form->id,
				'item_sched3_1A'      =>request('frm1702RT:txtPg4Sc3I1OtherTaxIncome'),
				'item_sched3_1B'      =>request('frm1702RT:txtPg4Sc3I1OtherTaxAmount'),
				'item_sched3_2A'      =>request('frm1702RT:txtPg4Sc3I2OtherTaxIncome'),
				'item_sched3_2B'      =>request('frm1702RT:txtPg4Sc3I2OtherTaxAmount'),
				'item_sched3_3A'      =>request('frm1702RT:txtPg4Sc3I3OtherTaxIncome'),
				'item_sched3_3B'      =>request('frm1702RT:txtPg4Sc3I3OtherTaxAmount'),
				'item_sched3_4'      =>request('frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount'),
				'item_sched4_1'      =>request('frm1702RT:txtPg4Sc4I1Advertising'),
				'item_sched4_2A'      =>request('frm1702RT:txtPg4Sc4I2Amortization'),
				'item_sched4_2B'      =>request('frm1702RT:txtPg4Sc4I2AmortizationAmount'),
				'item_sched4_3A'      =>request('frm1702RT:txtPg4Sc4I3Amortization'),
				'item_sched4_3B'      =>request('frm1702RT:txtPg4Sc4I3AmortizationAmount'),
				'item_sched4_4A'      =>request('frm1702RT:txtPg4Sc4I4Amortization'),
				'item_sched4_4B'      =>request('frm1702RT:txtPg4Sc4I4AmortizationAmount'),
				'item_sched4_5'      =>request('frm1702RT:txtPg4Sc4I5BadDebts'),
				'item_sched4_6'      =>request('frm1702RT:txtPg4Sc4I6CharitableContributions'),
				'item_sched4_7'      =>request('frm1702RT:txtPg4Sc4I7Commissions'),
				'item_sched4_8'      =>request('frm1702RT:txtPg4Sc4I8Communication'),
				'item_sched4_9'      =>request('frm1702RT:txtPg4Sc4I9Depletion'),
				'item_sched4_10'      =>request('frm1702RT:txtPg4Sc4I10Depreciation'),
				'item_sched4_11'      =>request('frm1702RT:txtPg4Sc4I11DirectorsFee'),
				'item_sched4_12'      =>request('frm1702RT:txtPg4Sc4I12FringeBenefits'),
				'item_sched4_13'      =>request('frm1702RT:txtPg4Sc4I13Fuel'),
				'item_sched4_14'      =>request('frm1702RT:txtPg4Sc4I14Insurance'),
				'item_sched4_15'      =>request('frm1702RT:txtPg4Sc4I15Interest'),
				'item_sched4_16'      =>request('frm1702RT:txtPg4Sc4I16Janitorial'),
				'item_sched4_17'      =>request('frm1702RT:txtPg4Sc4I17Losses'),
				'item_sched4_18'      =>request('frm1702RT:txtPg4Sc4I18Management'),
				'item_sched4_19'      =>request('frm1702RT:txtPg4Sc4I19Miscellaneous'),
				'item_sched4_20'      =>request('frm1702RT:txtPg4Sc4I20OfficeSupplies'),
				'item_sched4_21'      =>request('frm1702RT:txtPg4Sc4I21OtherServices'),
				'item_sched4_22'      =>request('frm1702RT:txtPg4Sc4I22ProfessionalFees'),
				'item_sched4_23'      =>request('frm1702RT:txtPg4Sc4I23Rental'),
				'item_sched4_24'      =>request('frm1702RT:txtPg4Sc4I24Repairs'),
				'item_sched4_25'      =>request('frm1702RT:txtPg4Sc4I25Repairs'),
				'item_sched4_26'      =>request('frm1702RT:txtPg4Sc4I26Representation'),
				'item_sched4_27'      =>request('frm1702RT:txtPg4Sc4I27Research'),
				'item_sched4_28'      =>request('frm1702RT:txtPg4Sc4I28Royalties'),
				'item_sched4_29'      =>request('frm1702RT:txtPg4Sc4I29Salaries'),
    	]);

    	if(request('form_id') != ""){
    		tbl_1702RT_schedule3::where('form_id', $getForm[0]->id)->delete();
    		tbl_1702RT_schedule4::where('form_id', $getForm[0]->id)->delete();
            $page4 = tbl_1702RT_4::find(request('form_id'));
            $page4->update($data4);
        }else{
        	$page4 = tbl_1702RT_4::find($form->id);
            if(empty($page4)){
                tbl_1702RT_4::create($data4);
            }else{
            	tbl_1702RT_schedule3::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule4::where('form_id', $getForm[0]->id)->delete();
                $page4->update($data4);
            }
        }

    	if(request('frm1702RT:txtPg4Sc3I3CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg4Sc3I3_description')) ; $i++) {
    			$sched3 = ([
    				"form_id"		=> $form->id,
    				"item_no"		=> '3.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg4Sc3I3_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg4Sc3I3_amount')[$i],
    			]);

    			tbl_1702RT_schedule3::create($sched3);
    		}
    	}

    	if(request('frm1702RT:txtPg4Sc4I4CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg4Sc4I4_description')) ; $i++) {
    			$sched4 = ([
    				"form_id"		=> $form->id,
    				"item_no"		=> '4.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg4Sc4I4_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg4Sc4I4_amount')[$i],
    			]);
    			tbl_1702RT_schedule4::create($sched4);
    		}
    	}

    	$data5 = ([
    		'form_id'     => $form->id,
			'item_sched4_30'     => request('frm1702RT:txtPg5Sc4I30SecurityServices'),
			'item_sched4_31'     => request('frm1702RT:txtPg5Sc4I31Contributions'),
			'item_sched4_32'     => request('frm1702RT:txtPg5Sc4I32TaxesandLicenses'),
			'item_sched4_33'     => request('frm1702RT:txtPg5Sc4I33TollingFees'),
			'item_sched4_34'     => request('frm1702RT:txtPg5Sc4I34TrainingandSeminars'),
			'item_sched4_35'     => request('frm1702RT:txtPg5Sc4I35TransportationandTravel'),
			'item_sched4_36A'     => request('frm1702RT:txtPg5Sc4I36C1'),
			'item_sched4_36B'     => request('frm1702RT:txtPg5Sc4I36C2'),
			'item_sched4_37A'     => request('frm1702RT:txtPg5Sc4I37C1'),
			'item_sched4_37B'     => request('frm1702RT:txtPg5Sc4I37C2'),
			'item_sched4_38A'     => request('frm1702RT:txtPg5Sc4I38C1'),
			'item_sched4_38B'     => request('frm1702RT:txtPg5Sc4I38C2'),
			'item_sched4_39A'     => request('frm1702RT:txtPg5Sc4I39C1'),
			'item_sched4_39B'     => request('frm1702RT:txtPg5Sc4I39C2'),
			'item_sched4_40'     => request('frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable'),
			'item_sched5_1A'     => request('frm1702RT:txtPg5Sc5I1C1'),
			'item_sched5_1B'     => request('frm1702RT:txtPg5Sc5I1C2'),
			'item_sched5_1C'     => request('frm1702RT:txtPg5Sc5I1C3'),
			'item_sched5_2A'     => request('frm1702RT:txtPg5Sc5I2C1'),
			'item_sched5_2B'     => request('frm1702RT:txtPg5Sc5I2C2'),
			'item_sched5_2C'     => request('frm1702RT:txtPg5Sc5I2C3'),
			'item_sched5_3A'     => request('frm1702RT:txtPg5Sc5I3C1'),
			'item_sched5_3B'     => request('frm1702RT:txtPg5Sc5I3C2'),
			'item_sched5_3C'     => request('frm1702RT:txtPg5Sc5I3C3'),
			'item_sched5_4A'     => request('frm1702RT:txtPg5Sc5I4C1'),
			'item_sched5_4B'     => request('frm1702RT:txtPg5Sc5I4C2'),
			'item_sched5_4C'     => request('frm1702RT:txtPg5Sc5I4C3'),
			'item_sched5_5'     => request('frm1702RT:txtPg5Sc5I5TotalSpecialAllowable'),
			'item_sched6_1'     => request('frm1702RT:txtPg5Sc6I1GrossIncome'),
			'item_sched6_2'     => request('frm1702RT:txtPg5Sc6I2TotalDeductions'),
			'item_sched6_3'     => request('frm1702RT:txtPg5Sc6I3NetOperatingLoss'),
			'item_sched6A_4_year'     => request('frm1702RT:txtPg5Sc6AI4C1'),
			'item_sched6A_4A'     => request('frm1702RT:txtPg5Sc6AI4C2'),
			'item_sched6A_4B'     => request('frm1702RT:txtPg5Sc6AI4C3'),
			'item_sched6A_4C'     => request('frm1702RT:txtPg5Sc6AI4C4'),
			'item_sched6A_4D'     => request('frm1702RT:txtPg5Sc6AI4C5'),
			'item_sched6A_4E'     => request('frm1702RT:txtPg5Sc6AI4C6'),
			'item_sched6A_5_year'     => request('frm1702RT:txtPg5Sc6AI5C1'),
			'item_sched6A_5A'     => request('frm1702RT:txtPg5Sc6AI5C2'),
			'item_sched6A_5B'     => request('frm1702RT:txtPg5Sc6AI5C3'),
			'item_sched6A_5C'     => request('frm1702RT:txtPg5Sc6AI5C4'),
			'item_sched6A_5D'     => request('frm1702RT:txtPg5Sc6AI5C5'),
			'item_sched6A_5E'     => request('frm1702RT:txtPg5Sc6AI5C6'),
			'item_sched6A_6_year'     => request('frm1702RT:txtPg5Sc6AI6C1'),
			'item_sched6A_6A'     => request('frm1702RT:txtPg5Sc6AI6C2'),
			'item_sched6A_6B'     => request('frm1702RT:txtPg5Sc6AI6C3'),
			'item_sched6A_6C'     => request('frm1702RT:txtPg5Sc6AI6C4'),
			'item_sched6A_6D'     => request('frm1702RT:txtPg5Sc6AI6C5'),
			'item_sched6A_6E'     => request('frm1702RT:txtPg5Sc6AI6C6'),
			'item_sched6A_7_year'     => request('frm1702RT:txtPg5Sc6AI7C1'),
			'item_sched6A_7A'     => request('frm1702RT:txtPg5Sc6AI7C2'),
			'item_sched6A_7B'     => request('frm1702RT:txtPg5Sc6AI7C3'),
			'item_sched6A_7C'     => request('frm1702RT:txtPg5Sc6AI7C4'),
			'item_sched6A_7D'     => request('frm1702RT:txtPg5Sc6AI7C5'),
			'item_sched6A_7E'     => request('frm1702RT:txtPg5Sc6AI7C6'),
			'item_sched6A_8'     => request('frm1702RT:txtPg5Sc6AI8TotalNOLCO'),
    	]);

    	if(request('form_id') != ""){
    		tbl_1702RT_schedule4_others::where('form_id', $getForm[0]->id)->delete();
    		tbl_1702RT_schedule5::where('form_id', $getForm[0]->id)->delete();
            $page5 = tbl_1702RT_5::find(request('form_id'));
            $page5->update($data5);
        }else{
        	$page5 = tbl_1702RT_5::find($form->id);
            if(empty($page5)){
                tbl_1702RT_5::create($data5);
            }else{
            	tbl_1702RT_schedule4_others::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule5::where('form_id', $getForm[0]->id)->delete();
                $page5->update($data5);
            }
        }

    	if(request('frm1702RT:txtPg5Sc4I39CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg5Sc4I39_description')) ; $i++) {
    			$sched4_others = ([
    				"form_id"		=> $form->id,
    				"item_no"		=> '39.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg5Sc4I39_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg5Sc4I39_amount')[$i],
    			]);
    			tbl_1702RT_schedule4_others::create($sched4_others);
    		}
    	}

    	if(request('frm1702RT:txtPg5Sc5I4CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg5Sc5I4_description')) ; $i++) {
    			$sched5 = ([
    				"form_id"		=> $form->id,
    				"item_no"		=> '4.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg5Sc5I4_description')[$i],
    				"legal_basis"	=> request('frm1702RT:txtPg5Sc5I4_legal')[$i],
    				"amount"		=> request('frm1702RT:txtPg5Sc5I4_amount')[$i],
    			]);
    			tbl_1702RT_schedule5::create($sched5);
    		}
    	}

    	$data6 = ([
				'form_id'     => $form->id,
				'item_sched7_1'     => request('frm1702RT:txtPg6Sc7I1ExcessCredits'),
				'item_sched7_2'     => request('frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT'),
				'item_sched7_3'     => request('frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular'),
				'item_sched7_4'     => request('frm1702RT:txtPg6Sc7I4ExcessMCIT'),
				'item_sched7_5'     => request('frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious'),
				'item_sched7_6'     => request('frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter'),
				'item_sched7_7'     => request('frm1702RT:txtPg6Sc7I7ForeignTaxCredits'),
				'item_sched7_8'     => request('frm1702RT:txtPg6Sc7I8TaxPaidInReturn'),
				'item_sched7_9'     => request('frm1702RT:txtPg6Sc7I9SpecialTaxCredits'),
				'item_sched7_10A'     => request('frm1702RT:txtPg6Sc7I10C1'),
				'item_sched7_10B'     => request('frm1702RT:txtPg5Sc7I10C2'),
				'item_sched7_11A'     => request('frm1702RT:txtPg6Sc7I11C1'),
				'item_sched7_11B'     => request('frm1702RT:txtPg6Sc7I11C2'),
				'item_sched7_12'     => request('frm1702RT:txtPg6Sc7I12TotalTaxCredits'),
				'item_sched8_1_year'     => request('frm1702RT:txtPg6Sc8I1C1'),
				'item_sched8_1A'     => request('frm1702RT:txtPg6Sc8I1C2'),
				'item_sched8_1B'     => request('frm1702RT:txtPg6Sc8I1C3'),
				'item_sched8_1C'     => request('frm1702RT:txtPg6Sc8I1C4'),
				'item_sched8_1D'     => request('frm1702RT:txtPg6Sc8I1C5'),
				'item_sched8_1E'     => request('frm1702RT:txtPg6Sc8I1C6'),
				'item_sched8_1F'     => request('frm1702RT:txtPg6Sc8I1C7'),
				'item_sched8_1G'     => request('frm1702RT:txtPg6Sc8I1C8'),
				'item_sched8_2_year'     => request('frm1702RT:txtPg6Sc8I2C1'),
				'item_sched8_2A'     => request('frm1702RT:txtPg6Sc8I2C2'),
				'item_sched8_2B'     => request('frm1702RT:txtPg6Sc8I2C3'),
				'item_sched8_2C'     => request('frm1702RT:txtPg6Sc8I2C4'),
				'item_sched8_2D'     => request('frm1702RT:txtPg6Sc8I2C5'),
				'item_sched8_2E'     => request('frm1702RT:txtPg6Sc8I2C6'),
				'item_sched8_2F'     => request('frm1702RT:txtPg6Sc8I2C7'),
				'item_sched8_2G'     => request('frm1702RT:txtPg6Sc8I2C8'),
				'item_sched8_3_year'     => request('frm1702RT:txtPg6Sc8I3C1'),
				'item_sched8_3A'     => request('frm1702RT:txtPg6Sc8I3C2'),
				'item_sched8_3B'     => request('frm1702RT:txtPg6Sc8I3C3'),
				'item_sched8_3C'     => request('frm1702RT:txtPg6Sc8I3C4'),
				'item_sched8_3D'     => request('frm1702RT:txtPg6Sc8I3C5'),
				'item_sched8_3E'     => request('frm1702RT:txtPg6Sc8I3C6'),
				'item_sched8_3F'     => request('frm1702RT:txtPg6Sc8I3C7'),
				'item_sched8_3G'     => request('frm1702RT:txtPg6Sc8I3C8'),
				'item_sched8_4'     => request('frm1702RT:txtPg6Sc8I4TotalExcessMCIT'),
				'item_sched9_1'     => request('frm1702RT:txtPg6Sc9I1NetIncome'),
				'item_sched9_2A'     => request('frm1702RT:txtPg6Sc9I2C1'),
				'item_sched9_2B'     => request('frm1702RT:txtPg6Sc9I2C2'),
				'item_sched9_3A'     => request('frm1702RT:txtPg6Sc9I3C1'),
				'item_sched9_3B'     => request('frm1702RT:txtPg6Sc9I3C2'),
				'item_sched9_4'     => request('frm1702RT:txtPg6Sc9I4Total'),
				'item_sched9_5A'     => request('frm1702RT:txtPg6Sc9I5C1'),
				'item_sched9_5B'     => request('frm1702RT:txtPg6Sc9I5C2'),
				'item_sched9_6A'     => request('frm1702RT:txtPg6Sc9I6C1'),
				'item_sched9_6B'     => request('frm1702RT:txtPg6Sc9I6C2'),
				'item_sched9_7A'     => request('frm1702RT:txtPg6Sc9I7C1'),
				'item_sched9_7B'     => request('frm1702RT:txtPg6Sc9I7C2'),
				'item_sched9_8A'     => request('frm1702RT:txtPg6Sc9I8C1'),
				'item_sched9_8B'     => request('frm1702RT:txtPg6Sc9I8C2'),
				'item_sched9_9'     => request('frm1702RT:txtPg6Sc9I9Total'),
				'item_sched9_10'     => request('frm1702RT:txtPg6Sc9I10NetTaxableIncome'),
    	]);

    	if(request('form_id') != ""){
    		tbl_1702RT_schedule7::where('form_id', $getForm[0]->id)->delete();
    		tbl_1702RT_schedule9_3::where('form_id', $getForm[0]->id)->delete();
            tbl_1702RT_schedule9_6::where('form_id', $getForm[0]->id)->delete();
            tbl_1702RT_schedule9_8::where('form_id', $getForm[0]->id)->delete();
            $page6 = tbl_1702RT_6::find(request('form_id'));
            $page6->update($data6);
        }else{
        	$page6 = tbl_1702RT_6::find($form->id);
            if(empty($page6)){
                tbl_1702RT_6::create($data6);
            }else{
            	tbl_1702RT_schedule7::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule9_3::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule9_6::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule9_8::where('form_id', $getForm[0]->id)->delete();
                $page6->update($data6);
            }
        }

    	if(request('frm1702RT:txtPg6Sc7I11CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc7I11_description')) ; $i++) {
    			$sched7 = ([
    				"form_id"		=> $form->id,
    				"item_no"		=> '11.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg6Sc7I11_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg6Sc7I11_amount')[$i],
    			]);
    			tbl_1702RT_schedule7::create($sched7);
    		}
    	}

    	if(request('frm1702RT:txtPg6Sc9I3CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I3_description')) ; $i++) {
    			$sched9_3 = ([
    				"form_id"		=>  $form->id,
    				"item_no"		=> '3.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg6Sc9I3_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg6Sc9I3_amount')[$i],
    			]);
    			tbl_1702RT_schedule9_3::create($sched9_3);
    		}
    	}

    	if(request('frm1702RT:txtPg6Sc9I6CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I6_description')) ; $i++) {
    			$sched9_6 = ([
    				"form_id"		=>  $form->id,
    				"item_no"		=> '6.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg6Sc9I6_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg6Sc9I6_amount')[$i],
    			]);
    			tbl_1702RT_schedule9_6::create($sched9_6);
    		}
    	}

    	if(request('frm1702RT:txtPg6Sc9I8CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I8_description')) ; $i++) {
    			$sched9_8 = ([
    				"form_id"		=>  $form->id,
    				"item_no"		=> '8.'.($i + 1),
    				"description"	=> request('frm1702RT:txtPg6Sc9I8_description')[$i],
    				"amount"		=> request('frm1702RT:txtPg6Sc9I8_amount')[$i],
    			]);
    			tbl_1702RT_schedule9_8::create($sched9_8);
    		}
    	}

    	$data7 = ([
    			'form_id'    => $form->id,
				'item_sched10_1'    => request('frm1702RT:txtPg7Sc10I1CurrentAssets'),
				'item_sched10_2'    => request('frm1702RT:txtPg7Sc10I2LongTermInvestment'),
				'item_sched10_3'    => request('frm1702RT:txtPg7Sc10I3PropertyPlantEquipment'),
				'item_sched10_4'    => request('frm1702RT:txtPg7Sc10I4LongTermReceivables'),
				'item_sched10_5'    => request('frm1702RT:txtPg7Sc10I5IntangibleAssets'),
				'item_sched10_6'    => request('frm1702RT:txtPg7Sc10I6OtherAssets'),
				'item_sched10_7'    => request('frm1702RT:txtPg7Sc10I7TotalAssets'),
				'item_sched10_8'    => request('frm1702RT:txtPg7Sc10I8CurrentLiabilities'),
				'item_sched10_9'    => request('frm1702RT:txtPg7Sc10I9LongTermLiabilities'),
				'item_sched10_10'    => request('frm1702RT:txtPg7Sc10I10DeferredCredits'),
				'item_sched10_11'    => request('frm1702RT:txtPg7Sc10I11OtherLiabilities'),
				'item_sched10_12'    => request('frm1702RT:txtPg7Sc10I12TotalLiabilities'),
				'item_sched10_13'    => request('frm1702RT:txtPg7Sc10I13CapitalStock'),
				'item_sched10_14'    => request('frm1702RT:txtPg7Sc10I14AdditionalCapital'),
				'item_sched10_15'    => request('frm1702RT:txtPg7Sc10I15RetainedEarnings'),
				'item_sched10_16'    => request('frm1702RT:txtPg7Sc10I16TotalEquity'),
				'item_sched10_17'    => request('frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity'),
				'item_sched11'    => request('frm1702RT:txtPg7Sc11I1C1'),
				'item_sched11_stock' => null !== request('frm1702RT:rdoPg7Sc11Option_stock') ? request('frm1702RT:rdoPg7Sc11Option_stock') : '',
				'item_sched11_partners' => null !== request('frm1702RT:rdoPg7Sc11Option_partners') ? request('frm1702RT:rdoPg7Sc11Option_partners') : '',
				'item_sched11_members' => null !== request('frm1702RT:rdoPg7Sc11Option_members') ? request('frm1702RT:rdoPg7Sc11Option_members') : '',
				'item_sched11_name1'       => request('frm1702RT:txtPg7Sc11I1C1'),
				'item_sched11_tin1A'       => request('frm1702RT:txtSc11Tin1'),
				'item_sched11_tin1B'       => request('frm1702RT:txtSc11Tin2'),
				'item_sched11_tin1C'       => request('frm1702RT:txtSc11Tin3'),
				'item_sched11_tin1D'       => request('frm1702RT:txtSc11Tin4'),
				'item_sched11_capital1'       => request('frm1702RT:txtPg7Sc11I1C3'),
				'item_sched11_total1'       => request('frm1702RT:txtPg7Sc11I1C4'),
				'item_sched11_name2'       => request('frm1702RT:txtPg7Sc11I2C1'),
				'item_sched11_tin2A'       => request('frm1702RT:txtPg7Sc11I2Tin1'),
				'item_sched11_tin2B'       => request('frm1702RT:txtPg7Sc11I2Tin2'),
				'item_sched11_tin2C'       => request('frm1702RT:txtPg7Sc11I2Tin3'),
				'item_sched11_tin2D'       => request('frm1702RT:txtPg7Sc11I2Tin4'),
				'item_sched11_capital2'       => request('frm1702RT:txtPg7Sc11I2C3'),
				'item_sched11_total2'       => request('frm1702RT:txtPg7Sc11I2C4'),
				'item_sched11_name3'       => request('frm1702RT:txtPg7Sc11I3C1'),
				'item_sched11_tin3A'       => request('frm1702RT:txtPg7Sc11I3Tin1'),
				'item_sched11_tin3B'       => request('frm1702RT:txtPg7Sc11I3Tin2'),
				'item_sched11_tin3C'       => request('frm1702RT:txtPg7Sc11I3Tin3'),
				'item_sched11_tin3D'       => request('frm1702RT:txtPg7Sc11I3Tin4'),
				'item_sched11_capital3'       => request('frm1702RT:txtPg7Sc11I3C3'),
				'item_sched11_total3'       => request('frm1702RT:txtPg7Sc11I3C4'),
				'item_sched11_name4'       => request('frm1702RT:txtPg7Sc11I4C1'),
				'item_sched11_tin4A'       => request('frm1702RT:txtPg7Sc11I4Tin1'),
				'item_sched11_tin4B'       => request('frm1702RT:txtPg7Sc11I4Tin2'),
				'item_sched11_tin4C'       => request('frm1702RT:txtPg7Sc11I4Tin3'),
				'item_sched11_tin4D'       => request('frm1702RT:txtPg7Sc11I4Tin4'),
				'item_sched11_capital4'       => request('frm1702RT:txtPg7Sc11I4C3'),
				'item_sched11_total4'       => request('frm1702RT:txtPg7Sc11I4C4'),
				'item_sched11_name5'       => request('frm1702RT:txtPg7Sc11I5C1'),
				'item_sched11_tin5A'       => request('frm1702RT:txtPg7Sc11I5Tin1'),
				'item_sched11_tin5B'       => request('frm1702RT:txtPg7Sc11I5Tin2'),
				'item_sched11_tin5C'       => request('frm1702RT:txtPg7Sc11I5Tin3'),
				'item_sched11_tin5D'       => request('frm1702RT:txtPg7Sc11I5Tin4'),
				'item_sched11_capital5'       => request('frm1702RT:txtPg7Sc11I5C3'),
				'item_sched11_total5'       => request('frm1702RT:txtPg7Sc11I5C4'),
				'item_sched11_name6'       => request('frm1702RT:txtPg7Sc11I6C1'),
				'item_sched11_tin6A'       => request('frm1702RT:txtPg7Sc11I6Tin1'),
				'item_sched11_tin6B'       => request('frm1702RT:txtPg7Sc11I6Tin2'),
				'item_sched11_tin6C'       => request('frm1702RT:txtPg7Sc11I6Tin3'),
				'item_sched11_tin6D'       => request('frm1702RT:txtPg7Sc11I6Tin4'),
				'item_sched11_capital6'       => request('frm1702RT:txtPg7Sc11I6C3'),
				'item_sched11_total6'       => request('frm1702RT:txtPg7Sc11I6C4'),
				'item_sched11_name7'       => request('frm1702RT:txtPg7Sc11I7C1'),
				'item_sched11_tin7A'       => request('frm1702RT:txtPg7Sc11I7Tin1'),
				'item_sched11_tin7B'       => request('frm1702RT:txtPg7Sc11I7Tin2'),
				'item_sched11_tin7C'       => request('frm1702RT:txtPg7Sc11I7Tin3'),
				'item_sched11_tin7D'       => request('frm1702RT:txtPg7Sc11I7Tin4'),
				'item_sched11_capital7'       => request('frm1702RT:txtPg7Sc11I7C3'),
				'item_sched11_total7'       => request('frm1702RT:txtPg7Sc11I7C4'),
				'item_sched11_name8'       => request('frm1702RT:txtPg7Sc11I8C1'),
				'item_sched11_tin8A'       => request('frm1702RT:txtPg7Sc11I8Tin1'),
				'item_sched11_tin8B'       => request('frm1702RT:txtPg7Sc11I8Tin2'),
				'item_sched11_tin8C'       => request('frm1702RT:txtPg7Sc11I8Tin3'),
				'item_sched11_tin8D'       => request('frm1702RT:txtPg7Sc11I8Tin4'),
				'item_sched11_capital8'       => request('frm1702RT:txtPg7Sc11I8C3'),
				'item_sched11_total8'       => request('frm1702RT:txtPg7Sc11I8C4'),
				'item_sched11_name9'       => request('frm1702RT:txtPg7Sc11I9C1'),
				'item_sched11_tin9A'       => request('frm1702RT:txtPg7Sc11I9Tin1'),
				'item_sched11_tin9B'       => request('frm1702RT:txtPg7Sc11I9Tin2'),
				'item_sched11_tin9C'       => request('frm1702RT:txtPg7Sc11I9Tin3'),
				'item_sched11_tin9D'       => request('frm1702RT:txtPg7Sc11I9Tin4'),
				'item_sched11_capital9'       => request('frm1702RT:txtPg7Sc11I9C3'),
				'item_sched11_total9'       => request('frm1702RT:txtPg7Sc11I9C4'),
				'item_sched11_name10'       => request('frm1702RT:txtPg7Sc11I10C1'),
				'item_sched11_tin10A'       => request('frm1702RT:txtPg7Sc11I10Tin1'),
				'item_sched11_tin10B'       => request('frm1702RT:txtPg7Sc11I10Tin2'),
				'item_sched11_tin10C'       => request('frm1702RT:txtPg7Sc11I10Tin3'),
				'item_sched11_tin10D'       => request('frm1702RT:txtPg7Sc11I10Tin4'),
				'item_sched11_capital10'       => request('frm1702RT:txtPg7Sc11I10C3'),
				'item_sched11_total10'       => request('frm1702RT:txtPg7Sc11I10C4'),
				'item_sched11_name11'       => request('frm1702RT:txtPg7Sc11I11C1'),
				'item_sched11_tin11A'       => request('frm1702RT:txtPg7Sc11I11Tin1'),
				'item_sched11_tin11B'       => request('frm1702RT:txtPg7Sc11I11Tin2'),
				'item_sched11_tin11C'       => request('frm1702RT:txtPg7Sc11I11Tin3'),
				'item_sched11_tin11D'       => request('frm1702RT:txtPg7Sc11I11Tin4'),
				'item_sched11_capital11'       => request('frm1702RT:txtPg7Sc11I11C3'),
				'item_sched11_total11'       => request('frm1702RT:txtPg7Sc11I11C4'),
				'item_sched11_name12'       => request('frm1702RT:txtPg7Sc11I12C1'),
				'item_sched11_tin12A'       => request('frm1702RT:txtPg7Sc11I12Tin1'),
				'item_sched11_tin12B'       => request('frm1702RT:txtPg7Sc11I12Tin2'),
				'item_sched11_tin12C'       => request('frm1702RT:txtPg7Sc11I12Tin3'),
				'item_sched11_tin12D'       => request('frm1702RT:txtPg7Sc11I12Tin4'),
				'item_sched11_capital12'       => request('frm1702RT:txtPg7Sc11I12C3'),
				'item_sched11_total12'       => request('frm1702RT:txtPg7Sc11I12C4'),
				'item_sched11_name13'       => request('frm1702RT:txtPg7Sc11I13C1'),
				'item_sched11_tin13A'       => request('frm1702RT:txtPg7Sc11I13Tin1'),
				'item_sched11_tin13B'       => request('frm1702RT:txtPg7Sc11I13Tin2'),
				'item_sched11_tin13C'       => request('frm1702RT:txtPg7Sc11I13Tin3'),
				'item_sched11_tin13D'       => request('frm1702RT:txtPg7Sc11I13Tin4'),
				'item_sched11_capital13'       => request('frm1702RT:txtPg7Sc11I13C3'),
				'item_sched11_total13'       => request('frm1702RT:txtPg7Sc11I13C4'),
				'item_sched11_name14'       => request('frm1702RT:txtPg7Sc11I14C1'),
				'item_sched11_tin14A'       => request('frm1702RT:txtPg7Sc11I14Tin1'),
				'item_sched11_tin14B'       => request('frm1702RT:txtPg7Sc11I14Tin2'),
				'item_sched11_tin14C'       => request('frm1702RT:txtPg7Sc11I14Tin3'),
				'item_sched11_tin14D'       => request('frm1702RT:txtPg7Sc11I14Tin4'),
				'item_sched11_capital14'       => request('frm1702RT:txtPg7Sc11I14C3'),
				'item_sched11_total14'       => request('frm1702RT:txtPg7Sc11I14C4'),
				'item_sched11_name15'       => request('frm1702RT:txtPg7Sc11I15C1'),
				'item_sched11_tin15A'       => request('frm1702RT:txtPg7Sc11I15Tin1'),
				'item_sched11_tin15B'       => request('frm1702RT:txtPg7Sc11I15Tin2'),
				'item_sched11_tin15C'       => request('frm1702RT:txtPg7Sc11I15Tin3'),
				'item_sched11_tin15D'       => request('frm1702RT:txtPg7Sc11I15Tin4'),
				'item_sched11_capital15'       => request('frm1702RT:txtPg7Sc11I15C3'),
				'item_sched11_total15'       => request('frm1702RT:txtPg7Sc11I15C4'),
				'item_sched11_name16'       => request('frm1702RT:txtPg7Sc11I16C1'),
				'item_sched11_tin16A'       => request('frm1702RT:txtPg7Sc11I16Tin1'),
				'item_sched11_tin16B'       => request('frm1702RT:txtPg7Sc11I16Tin2'),
				'item_sched11_tin16C'       => request('frm1702RT:txtPg7Sc11I16Tin3'),
				'item_sched11_tin16D'       => request('frm1702RT:txtPg7Sc11I16Tin4'),
				'item_sched11_capital16'       => request('frm1702RT:txtPg7Sc11I16C3'),
				'item_sched11_total16'       => request('frm1702RT:txtPg7Sc11I16C4'),
				'item_sched11_name17'       => request('frm1702RT:txtPg7Sc11I17C1'),
				'item_sched11_tin17A'       => request('frm1702RT:txtPg7Sc11I17Tin1'),
				'item_sched11_tin17B'       => request('frm1702RT:txtPg7Sc11I17Tin2'),
				'item_sched11_tin17C'       => request('frm1702RT:txtPg7Sc11I17Tin3'),
				'item_sched11_tin17D'       => request('frm1702RT:txtPg7Sc11I17Tin4'),
				'item_sched11_capital17'       => request('frm1702RT:txtPg7Sc11I17C3'),
				'item_sched11_total17'       => request('frm1702RT:txtPg7Sc11I17C4'),
				'item_sched11_name18'       => request('frm1702RT:txtPg7Sc11I18C1'),
				'item_sched11_tin18A'       => request('frm1702RT:txtPg7Sc11I18Tin1'),
				'item_sched11_tin18B'       => request('frm1702RT:txtPg7Sc11I18Tin2'),
				'item_sched11_tin18C'       => request('frm1702RT:txtPg7Sc11I18Tin3'),
				'item_sched11_tin18D'       => request('frm1702RT:txtPg7Sc11I18Tin4'),
				'item_sched11_capital18'       => request('frm1702RT:txtPg7Sc11I18C3'),
				'item_sched11_total18'       => request('frm1702RT:txtPg7Sc11I18C4'),
				'item_sched11_name19'       => request('frm1702RT:txtPg7Sc11I19C1'),
				'item_sched11_tin19A'       => request('frm1702RT:txtPg7Sc11I19Tin1'),
				'item_sched11_tin19B'       => request('frm1702RT:txtPg7Sc11I19Tin2'),
				'item_sched11_tin19C'       => request('frm1702RT:txtPg7Sc11I19Tin3'),
				'item_sched11_tin19D'       => request('frm1702RT:txtPg7Sc11I19Tin4'),
				'item_sched11_capital19'       => request('frm1702RT:txtPg7Sc11I19C3'),
				'item_sched11_total19'       => request('frm1702RT:txtPg7Sc11I19C4'),
				'item_sched11_name20'       => request('frm1702RT:txtPg7Sc11I20C1'),
				'item_sched11_tin20A'       => request('frm1702RT:txtPg7Sc11I20Tin1'),
				'item_sched11_tin20B'       => request('frm1702RT:txtPg7Sc11I20Tin2'),
				'item_sched11_tin20C'       => request('frm1702RT:txtPg7Sc11I20Tin3'),
				'item_sched11_tin20D'       => request('frm1702RT:txtPg7Sc11I20Tin4'),
				'item_sched11_capital20'       => request('frm1702RT:txtPg7Sc11I20C3'),
				'item_sched11_total20'       => request('frm1702RT:txtPg7Sc11I20C4'),
    	]);
    	
    	if(request('form_id') != ""){
            $page7 = tbl_1702RT_7::find(request('form_id'));
            $page7->update($data7);
        }else{
        	$page7 = tbl_1702RT_7::find($form->id);
            if(empty($page7)){
                tbl_1702RT_7::create($data7);
            }else{
                $page7->update($data7);
            }
        }

		$data8 = ([
			'form_id'    => $form->id,
			'item_sched12_1A'     => request('frm1702RT:txtPg8Sc12I1C1'),
			'item_sched12_1B'     => request('frm1702RT:txtPg8Sc12I1C2'),
			'item_sched12_1C'     => request('frm1702RT:txtPg8Sc12I1C3'),
			'item_sched12_2A'     => request('frm1702RT:txtPg8Sc12I2C1'),
			'item_sched12_2B'     => request('frm1702RT:txtPg8Sc12I2C2'),
			'item_sched12_2C'     => request('frm1702RT:txtPg8Sc12I2C3'),
			'item_sched12_3A'     => request('frm1702RT:txtPg8Sc12I3C1'),
			'item_sched12_3B'     => request('frm1702RT:txtPg8Sc12I3C2'),
			'item_sched12_3C'     => request('frm1702RT:txtPg8Sc12I3C3'),
			'item_sched12_4A'     => request('frm1702RT:txtPg8Sc12I4C1'),
			'item_sched12_4B'     => request('frm1702RT:txtPg8Sc12I4C2'),
			'item_sched12_4C'     => request('frm1702RT:txtPg8Sc12I4C3'),
			'item_sched12_4_other_total'     => request('frm1702RT:txtPg8Sc12I4SubTotal'),
			'item_sched12_5A'     => request('frm1702RT:txtPg8Sc12I5C1'),
			'item_sched12_5B'     => request('frm1702RT:txtPg8Sc12I5C2'),
			'item_sched12_6A'     => request('frm1702RT:txtPg8Sc12I6C1'),
			'item_sched12_6B'     => request('frm1702RT:txtPg8Sc12I6C2'),
			'item_sched12_7A'     => request('frm1702RT:txtPg8Sc12I7C1'),
			'item_sched12_7B'     => request('frm1702RT:txtPg8Sc12I7C2'),
			'item_sched12_8A'     => request('frm1702RT:txtPg8Sc12I8C1'),
			'item_sched12_8B'     => request('frm1702RT:txtPg8Sc12I8C2'),
			'item_sched12_9A'     => request('frm1702RT:txtPg8Sc12I9C1'),
			'item_sched12_9B'     => request('frm1702RT:txtPg8Sc12I9C2'),
			'item_sched12_10A_type'     => request('frm1702RT:ddlPg8Sc12I10C1'),
			'item_sched12_10A_stock'     => request('frm1702RT:txtPg8Sc12I10C1'),
			'item_sched12_10B_type'     => request('frm1702RT:ddlPg8Sc12I10C2'),
			'item_sched12_10B_stock'     => request('frm1702RT:txtPg8Sc12I10C2'),
			'item_sched12_11A'     => request('frm1702RT:txtPg8Sc12I11C1'),
			'item_sched12_11B'     => request('frm1702RT:txtPg8Sc12I11C2'),
			'item_sched12_12A'     => request('frm1702RT:txtPg8Sc12I12C1'),
			'item_sched12_12B'     => request('frm1702RT:txtPg8Sc12I12C2'),
			'item_sched12_13A'     => request('frm1702RT:txtPg8Sc12I13C1Date'),
			'item_sched12_13B'     => request('frm1702RT:txtPg8Sc12I13C2Date'),
			'item_sched12_14A'     => request('frm1702RT:txtPg8Sc12I14C1'),
			'item_sched12_14B'     => request('frm1702RT:txtPg8Sc12I14C2'),
			'item_sched12_15A'     => request('frm1702RT:txtPg8Sc12I15C1'),
			'item_sched12_15B'     => request('frm1702RT:txtPg8Sc12I15C2'),
			'item_sched12_16A'     => request('frm1702RT:txtPg8Sc12I16C1'),
			'item_sched12_16B'     => request('frm1702RT:txtPg8Sc12I16C2'),
			'item_sched12_17A'     => request('frm1702RT:txtPg8Sc12I17C1'),
			'item_sched12_17B'     => request('frm1702RT:txtPg8Sc12I17C2'),
			'item_sched12_18A'     => request('frm1702RT:txtPg8Sc12I18C1'),
			'item_sched12_18B'     => request('frm1702RT:txtPg8Sc12I18C2'),
			'item_sched12_19'     => request('frm1702RT:txtSc12I19TotalFinalTaxWitheld'),
			'item_sched13_1'     => request('frm1702RT:txtPg8Sc13I1ReturnOfPremium'),
			'item_sched13_2A'     => request('frm1702RT:txtPg8Sc13I2C1'),
			'item_sched13_2B'     => request('frm1702RT:txtPg8Sc13I2C2'),
			'item_sched13_3A'     => request('frm1702RT:txtPg8Sc13I3C1'),
			'item_sched13_3B'     => request('frm1702RT:txtPg8Sc13I3C2'),
			'item_sched13_4A'     => request('frm1702RT:txtPg8Sc13I4C1'),
			'item_sched13_4B'     => request('frm1702RT:txtPg8Sc13I4C2'),
			'item_sched13_5A'     => request('frm1702RT:txtPg8Sc13I5C1'),
			'item_sched13_5B'     => request('frm1702RT:txtPg8Sc13I5C2'),
			'item_sched13_6A'     => request('frm1702RT:txtPg8Sc13I6C1'),
			'item_sched13_6B'     => request('frm1702RT:txtPg8Sc13I6C2'),
			'item_sched13_7A'     => request('frm1702RT:txtPg8Sc13I7C1'),
			'item_sched13_7B'     => request('frm1702RT:txtPg8Sc13I7C2'),
			'item_sched13_8'     => request('frm1702RT:txtPg8Sc13I8TotalIncome'),
		]);

		if(request('form_id') != ""){
			tbl_1702RT_schedule12_1::where('form_id', $getForm[0]->id)->delete();
			tbl_1702RT_schedule12_2::where('form_id', $getForm[0]->id)->delete();
			tbl_1702RT_schedule12_3::where('form_id', $getForm[0]->id)->delete();
			tbl_1702RT_schedule12_4::where('form_id', $getForm[0]->id)->delete();
			tbl_1702RT_schedule13_1::where('form_id', $getForm[0]->id)->delete();
			tbl_1702RT_schedule13_2::where('form_id', $getForm[0]->id)->delete();
            $page8 = tbl_1702RT_8::find(request('form_id'));
            $page8->update($data8);
        }else{
        	$page8 = tbl_1702RT_8::find($form->id);
            if(empty($page8)){
                tbl_1702RT_8::create($data8);
            }else{
            	tbl_1702RT_schedule12_1::where('form_id', $getForm[0]->id)->delete();
            	tbl_1702RT_schedule12_2::where('form_id', $getForm[0]->id)->delete();
				tbl_1702RT_schedule12_3::where('form_id', $getForm[0]->id)->delete();
				tbl_1702RT_schedule12_4::where('form_id', $getForm[0]->id)->delete();
				tbl_1702RT_schedule13_1::where('form_id', $getForm[0]->id)->delete();
				tbl_1702RT_schedule13_2::where('form_id', $getForm[0]->id)->delete();
                $page8->update($data8);
            }
        }

		if(null !== request('frm1702RT:txtPg8Sc12I4_gross')){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc12I4_gross')) ; $i++) {
				$sched12_1 = ([
					'form_id'     =>  $form->id,
					'income'     => request('frm1702RT:txtPg8Sc12I4_gross')[$i],
					'itemA'     => request('frm1702RT:txtPg8Sc12I4_exempt')[$i],
					'itemB'     => request('frm1702RT:txtPg8Sc12I4_amount')[$i],
					'itemC'     => request('frm1702RT:txtPg8Sc12I4_tax')[$i],
    			]);
    			tbl_1702RT_schedule12_1::create($sched12_1);
			}
		}

		if(null !== request('frm1702RT:txtPg8Sc12I5CA')){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc12I5CA')) / 2; $i++) {
				$sched12_2 = ([
					'form_id'    => $form->id,
					'item5C'     => request('frm1702RT:txtPg8Sc12I5CA')[$i],
					'item5D'     => request('frm1702RT:txtPg8Sc12I5CB')[$i],
					'item6C'     => request('frm1702RT:txtPg8Sc12I6CA')[$i],
					'item6D'     => request('frm1702RT:txtPg8Sc12I6CB')[$i],
					'item7C'     => request('frm1702RT:txtPg8Sc12I7CA')[$i],
					'item7D'     => request('frm1702RT:txtPg8Sc12I7CB')[$i],
					'item8A'     => request('frm1702RT:txtPg8Sc12I8CA')[$i],
					'item8B'     => request('frm1702RT:txtPg8Sc12I8CB')[$i],
					'item9A'     => request('frm1702RT:txtPg8Sc12I9CA')[$i],
					'item9B'     => request('frm1702RT:txtPg8Sc12I9CB')[$i],
    			]);
    			tbl_1702RT_schedule12_2::create($sched12_2);
			}
		}

		if(null !== request('frm1702RT:drpPg8Sc12I10CA-1')){
			for ($i=0; $i < count(request('frm1702RT:drpPg8Sc12I10CA-1')) / 2; $i++) {
				$sched12_3 = ([
					'form_id'   => $form->id,
					'item10C_type'   => request('frm1702RT:drpPg8Sc12I10CA-1')[$i],
					'item10C_stock'   => request('frm1702RT:txtPg8Sc12I10CA-2')[$i],
					'item10D_type'   => request('frm1702RT:drpPg8Sc12I10CB-1')[$i],
					'item10D_stock'   => request('frm1702RT:txtPg8Sc12I10CB-2')[$i],
					'item11C'   => request('frm1702RT:txtPg8Sc12I11CA')[$i],
					'item11D'   => request('frm1702RT:txtPg8Sc12I11CB')[$i],
					'item12C'   => request('frm1702RT:txtPg8Sc12I12CA')[$i],
					'item12D'   => request('frm1702RT:txtPg8Sc12I12CB')[$i],
					'item13C'   => request('frm1702RT:txtPg8Sc12I13CADate')[$i],
					'item13D'   => request('frm1702RT:txtPg8Sc12I13CBDate')[$i],
					'item14C'   => request('frm1702RT:txtPg8Sc12I14CA')[$i],
					'item14D'   => request('frm1702RT:txtPg8Sc12I14CB')[$i],
					'item15C'   => request('frm1702RT:txtPg8Sc12I15CA')[$i],
					'item15D'   => request('frm1702RT:txtPg8Sc12I15CB')[$i],
    			]);
    			tbl_1702RT_schedule12_3::create($sched12_3);
			}
		}

		if(null !== request('frm1702RT:txtPg8Sc12I16CA')){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc12I16CA')) / 2; $i++) {
				$sched12_4 = ([
					'form_id'     =>  $form->id,
					'item16C'     => request('frm1702RT:txtPg8Sc12I16CA')[$i],
					'item16D'     => request('frm1702RT:txtPg8Sc12I16CB')[$i],
					'item17C'     => request('frm1702RT:txtPg8Sc12I17CA')[$i],
					'item17D'     => request('frm1702RT:txtPg8Sc12I17CB')[$i],
					'item18C'     => request('frm1702RT:txtPg8Sc12I18CA')[$i],
					'item18D'     => request('frm1702RT:txtPg8Sc12I18CB')[$i],
    			]);
    			tbl_1702RT_schedule12_4::create($sched12_4);
			}
		}

		if(null !== request('frm1702RT:txtPg8Sc13I2CA')){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc13I2CA')) / 2; $i++) {
				$sched13_1 = ([
					'form_id'     =>  $form->id,
					'item2C'     => request('frm1702RT:txtPg8Sc13I2CA')[$i],
					'item2D'     => request('frm1702RT:txtPg8Sc13I2CB')[$i],
					'item3C'     => request('frm1702RT:txtPg8Sc13I3CA')[$i],
					'item3D'     => request('frm1702RT:txtPg8Sc13I3CB')[$i],
					'item4C'     => request('frm1702RT:txtPg8Sc13I4CA')[$i],
					'item4D'     => request('frm1702RT:txtPg8Sc13I4CB')[$i],
					'item5C'     => request('frm1702RT:txtPg8Sc13I5CA')[$i],
					'item5D'     => request('frm1702RT:txtPg8Sc13I5CB')[$i],
    			]);
    			tbl_1702RT_schedule13_1::create($sched13_1);
			}
		}

		if(null !== request('frm1702RT:txtPg8Sc13I6CA')){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc13I6CA')) / 2; $i++) {
				$sched13_2 = ([
					'form_id'     =>  $form->id,
					'item6C'     => request('frm1702RT:txtPg8Sc13I6CA')[$i],
					'item6D'     => request('frm1702RT:txtPg8Sc13I6CB')[$i],
					'item7C'     => request('frm1702RT:txtPg8Sc13I7CA')[$i],
					'item7D'     => request('frm1702RT:txtPg8Sc13I7CB')[$i],
    			]);
    			tbl_1702RT_schedule13_2::create($sched13_2);
			}
		}

		/*XML*/
		$rdoPg1I1Calendar = "false";
        $rdoPg1I1Fiscal = "false";
        if(request('frm1702RT:rdoPg1I1') == 'C'){
            $rdoPg1I1Calendar = "true";
        }else if(request('frm1702RT:rdoPg1I1') == 'F'){
            $rdoPg1I1Fiscal = "true";
        }

        $rdoPg1I2AmmendYes = "false";
        $rdoPg1I2AmmendNo = "false";
        if(request('frm1702RT:rdoPg1I2Ammend') == 'Y'){
            $rdoPg1I2AmmendYes = "true";
        }else if(request('frm1702RT:rdoPg1I2Ammend') == 'N'){
            $rdoPg1I2AmmendNo = "true";
        }

        $rdoPg1I4ShortPeriodYes = "false";
        $rdoPg1I4ShortPeriodNo = "false";
        if(request('frm1702RT:rdoPg1I4ShortPeriod') == 'Y'){
            $rdoPg1I4ShortPeriodYes = "true";
        }else if(request('frm1702RT:rdoPg1I4ShortPeriod') == 'N'){
            $rdoPg1I4ShortPeriodNo = "true";
        }

        $rdoPg1I5AtcOther = "false";
        if(null !== request('frm1702RT:rdoPg1I5Atc_Other')){
            if(request('frm1702RT:rdoPg1I5Atc_Other') == 'on'){
                $rdoPg1I5AtcOther = "true";
            }
        }

        $getCompany = Companies::where('id', request('company'))->get();
 
        $taxPayerName =  rawurlencode($getCompany[0]->registered_name);

        $address = rawurlencode(request('frm1702RT:txtPg1Pt1I10Address'));

        $getLineBusiness = str_replace(' ', '%2520',request('frm1702RT:txtPg1Pt1I13Business')); 
        $lineBusiness = str_replace(',', '%2C', $getLineBusiness);

        $rdoPg1Pt1I15ItemizedDeduction = "false";
        $rdoPg1Pt1I15OptionalStandard = "false";

        if(null !== request('frm1702RT:rdoPg1Pt1I15ItemizedDeduction')){
            if(request('frm1702RT:rdoPg1Pt1I15ItemizedDeduction') == 'on'){
                $rdoPg1Pt1I15ItemizedDeduction = "true";
            }
        }

        if(null !== request('frm1702RT:rdoPg1Pt1I15OptionalStandard')){
            if(request('frm1702RT:rdoPg1Pt1I15OptionalStandard') == 'on'){
                $rdoPg1Pt1I15OptionalStandard = "true";
            }
        }

        $rdoPg1Pt2I21OverpaymentRefunded = "false";
        $rdoPg1Pt2I21OverpaymentIssued = "false";
		$rdoPg1Pt2I21OverpaymentCarried = "false";

		if(null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded')){
            if(request('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded') == '1'){
                $rdoPg1Pt2I21OverpaymentRefunded = "true";
            }else if(request('frm1702RT:rdoPg1Pt2I21OverpaymentRefunded') == '0'){
            	$rdoPg1Pt2I21OverpaymentRefunded = "false";
            }
        }

        if(null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentIssued')){
            if(request('frm1702RT:rdoPg1Pt2I21OverpaymentIssued') == '1'){
                $rdoPg1Pt2I21OverpaymentIssued = "true";
            }else if(request('frm1702RT:rdoPg1Pt2I21OverpaymentIssued') == '0'){
            	$rdoPg1Pt2I21OverpaymentIssued = "false";
            }
        }

        if(null !== request('frm1702RT:rdoPg1Pt2I21OverpaymentCarried')){
            if(request('frm1702RT:rdoPg1Pt2I21OverpaymentCarried') == '1'){
                $rdoPg1Pt2I21OverpaymentCarried = "true";
            }else if(request('frm1702RT:rdoPg1Pt2I21OverpaymentCarried') == '0'){
            	$rdoPg1Pt2I21OverpaymentCarried = "false";
            }
        }

        $rdoPg1Pt2I22CTC = "false";
        $rdoPg1Pt2I22SEC = "false";

        if(null !== request('frm1702RT:rdoPg1Pt2I22')){
            if(request('frm1702RT:rdoPg1Pt2I22') == 'CTC'){
                $rdoPg1Pt2I22CTC = "true";
            }else if(request('frm1702RT:rdoPg1Pt2I22') == 'SEC'){
            	$rdoPg1Pt2I22SEC = "false";
            }
        }

        $chkPg7Sc11Stockholders = "false";
        $chkPg7Sc11Partners = "false";
		$chkPg7Sc11Members = "false";

        if(null !== request('frm1702RT:rdoPg7Sc11Option_stock')){
            if(request('frm1702RT:rdoPg7Sc11Option_stock') == '0'){
                 $chkPg7Sc11Stockholders = "true";
            }
        }

        if(null !== request('frm1702RT:rdoPg7Sc11Option_partners')){
            if(request('frm1702RT:rdoPg7Sc11Option_partners') == '0'){
                 $chkPg7Sc11Partners = "true";
            }
        }

        if(null !== request('frm1702RT:rdoPg7Sc11Option_members')){
            if(request('frm1702RT:rdoPg7Sc11Option_members') == '0'){
                 $chkPg7Sc11Members = "true";
            }
        }

        $xml_sched3 = "";
        if(request('frm1702RT:txtPg4Sc3I3CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg4Sc3I3_description')) ; $i++) {
    			$xml_sched3 .="
            <div>frm1702RT:txtPg4Sc3I3.".($i + 1)."C1=".request('frm1702RT:txtPg4Sc3I3_description')[$i]."frm1702RT:txtPg4Sc3I3.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg4Sc3I3.".($i + 1)."C2=".request('frm1702RT:txtPg4Sc3I3_amount')[$i]."frm1702RT:txtPg4Sc3I3.".($i + 1)."C2=</div>	";
    		}
    	}

        $xml_sched4 = "";
        if(request('frm1702RT:txtPg4Sc4I4CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg4Sc4I4_description')) ; $i++) {
    			$xml_sched4 .= "
            <div>frm1702RT:txtPg4Sc4I4.".($i + 1)."C1=".request('frm1702RT:txtPg4Sc4I4_description')[$i]."frm1702RT:txtPg4Sc4I4.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg4Sc4I4.".($i + 1)."C2=".request('frm1702RT:txtPg4Sc4I4_amount')[$i]."frm1702RT:txtPg4Sc4I4.".($i + 1)."C2=</div>	";
    		}
    	}

        $xml_sched4_others = "";
    	if(request('frm1702RT:txtPg5Sc4I39CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg5Sc4I39_description')) ; $i++) {
    			$xml_sched4_others .= "
            <div>frm1702RT:txtPg5Sc4I39.".($i + 1)."C1=".request('frm1702RT:txtPg5Sc4I39_description')[$i]."frm1702RT:txtPg5Sc4I39.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg5Sc4I39.".($i + 1)."C2=".str_replace(',', '', request('frm1702RT:txtPg5Sc4I39_amount')[$i])."frm1702RT:txtPg5Sc4I39.".($i + 1)."C2=</div>	";
    		}
    	}

    	$xml_sched5 = "";
    	if(request('frm1702RT:txtPg5Sc5I4CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg5Sc5I4_description')) ; $i++) {
    			$xml_sched5 .= "
            <div>frm1702RT:txtPg5Sc5I4.".($i + 1)."C1=".request('frm1702RT:txtPg5Sc5I4_description')[$i]."frm1702RT:txtPg5Sc5I4.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg5Sc5I4.".($i + 1)."C2=".request('frm1702RT:txtPg5Sc5I4_legal')[$i]."frm1702RT:txtPg5Sc5I4.".($i + 1)."C2=</div>	
            <div>frm1702RT:txtPg5Sc5I4.".($i + 1)."C3=".request('frm1702RT:txtPg5Sc5I4_amount')[$i]."frm1702RT:txtPg5Sc5I4.".($i + 1)."C3=</div>	";
    		}
    	}

    	$xml_sched7 = "";
    	if(request('frm1702RT:txtPg6Sc7I11CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc7I11_description')) ; $i++) {
    			$xml_sched7 .= "
            <div>frm1702RT:txtPg6Sc7I11.".($i + 1)."C1=".request('frm1702RT:txtPg6Sc7I11_description')[$i]."frm1702RT:txtPg6Sc7I11.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg6Sc7I11.".($i + 1)."C2=".request('frm1702RT:txtPg6Sc7I11_amount')[$i]."frm1702RT:txtPg6Sc7I11.".($i + 1)."C2=</div>	";
    		}
    	}

    	$xml_sched9_3 = "";
    	if(request('frm1702RT:txtPg6Sc9I3CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I3_description')) ; $i++) {
    			$xml_sched9_3 .= "
            <div>frm1702RT:txtPg6Sc9I3.".($i + 1)."C1=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I3_description')[$i])."frm1702RT:txtPg6Sc9I3.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg6Sc9I3.".($i + 1)."C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I3_amount')[$i] )."frm1702RT:txtPg6Sc9I3.".($i + 1)."C2=</div>	";
    		}
    	}

    	$xml_sched9_6 = "";
    	if(request('frm1702RT:txtPg6Sc9I6CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I6_description')) ; $i++) {
    			$xml_sched9_6 .= "
            <div>frm1702RT:txtPg6Sc9I6.".($i + 1)."C1=".request('frm1702RT:txtPg6Sc9I6_description')[$i]."frm1702RT:txtPg6Sc9I6.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg6Sc9I6.".($i + 1)."C2=".request('frm1702RT:txtPg6Sc9I6_amount')[$i]."frm1702RT:txtPg6Sc9I6.".($i + 1)."C2=</div>	";
    		}
    	}

    	$xml_sched9_8 = "";
    	if(request('frm1702RT:txtPg6Sc9I8CtrModal') != '0'){
    		for ($i=0; $i < count(request('frm1702RT:txtPg6Sc9I8_description')) ; $i++) {
    			$xml_sched9_8 .= "
            <div>frm1702RT:txtPg6Sc9I8.".($i + 1)."C1=".request('frm1702RT:txtPg6Sc9I8_description')[$i]."frm1702RT:txtPg6Sc9I8.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg6Sc9I8.".($i + 1)."C2=".request('frm1702RT:txtPg6Sc9I8_amount')[$i]."frm1702RT:txtPg6Sc9I8.".($i + 1)."C2=</div>	";
    		}
    	}

    	$xml_sched12_1 = "";
    	if(request('frm1702RT:txtPg8Sc12I4CtrModal') != "0"){
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc12I4_gross')) ; $i++) {
				$xml_sched12_1 .= "
            <div>frm1702RT:txtPg8Sc12I4.".($i + 1)."C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4_gross')[$i])."frm1702RT:txtPg8Sc12I4.".($i + 1)."C1=</div>	
            <div>frm1702RT:txtPg8Sc12I4.".($i + 1)."C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4_exempt')[$i])."frm1702RT:txtPg8Sc12I4.".($i + 1)."C2=</div>	
            <div>frm1702RT:txtPg8Sc12I4.".($i + 1)."C3=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4_amount')[$i])."frm1702RT:txtPg8Sc12I4.".($i + 1)."C3=</div>	
            <div>frm1702RT:txtPg8Sc12I4.".($i + 1)."C4=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4_tax')[$i])."frm1702RT:txtPg8Sc12I4.".($i + 1)."C4=</div>	";
			}
		}

		$xml_sched12_2 = "";
		if(request('frm1702RT:txtCtrmodalPg8Sc12II') != "0"){
			$total = count(request('frm1702RT:txtPg8Sc12I5CA')) / 2;
			$num = 0; 
			for ($i=0; $i <  count(request('frm1702RT:txtPg8Sc12I5CA')); $i++) {
				$no =  ($num++ % $total) + 1; 
				$xml_sched12_2 .= "
            <div>frm1702RT:txtPg8Sc12I5CA-".$no."=".request('frm1702RT:txtPg8Sc12I5CA')[$i]."frm1702RT:txtPg8Sc12I5CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I5CB-".$no."=".request('frm1702RT:txtPg8Sc12I5CB')[$i]."frm1702RT:txtPg8Sc12I5CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I6CA-".$no."=".request('frm1702RT:txtPg8Sc12I6CA')[$i]."frm1702RT:txtPg8Sc12I6CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I6CB-".$no."=".request('frm1702RT:txtPg8Sc12I6CB')[$i]."frm1702RT:txtPg8Sc12I6CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I7CA-".$no."=".request('frm1702RT:txtPg8Sc12I7CA')[$i]."frm1702RT:txtPg8Sc12I7CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I7CB-".$no."=".request('frm1702RT:txtPg8Sc12I7CB')[$i]."frm1702RT:txtPg8Sc12I7CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I8CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I8CA')[$i])."frm1702RT:txtPg8Sc12I8CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I8CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I8CB')[$i])."frm1702RT:txtPg8Sc12I8CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I9CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I9CA')[$i])."frm1702RT:txtPg8Sc12I9CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I9CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I9CB')[$i])."frm1702RT:txtPg8Sc12I9CB-".$no."=</div>	";
			}
		}

		$xml_sched12_3 = "";
		if(request('frm1702RT:txtCtrmodalPg8Sc12III') != "0"){
			$total = count(request('frm1702RT:drpPg8Sc12I10CA-1')) / 2;
			$num = 0; 
			for ($i=0; $i <  count(request('frm1702RT:drpPg8Sc12I10CA-1')); $i++) {
				$no =  ($num++ % $total) + 1; 
				$xml_sched12_3 .= "<div>frm1702RT:drpPg8Sc12I10CA-1-".$no."=".request('frm1702RT:drpPg8Sc12I10CA-1')[$i]."frm1702RT:drpPg8Sc12I10CA-1-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I10CA-2-".$no."=".request('frm1702RT:txtPg8Sc12I10CA-2')[$i]."frm1702RT:txtPg8Sc12I10CA-2-".$no."=</div>	
            <div>frm1702RT:drpPg8Sc12I10CB-1-".$no."=".request('frm1702RT:drpPg8Sc12I10CB-1')[$i]."frm1702RT:drpPg8Sc12I10CB-1-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I10CB-2-".$no."=".request('frm1702RT:txtPg8Sc12I10CB-2')[$i]."frm1702RT:txtPg8Sc12I10CB-2-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I11CA-".$no."=".request('frm1702RT:txtPg8Sc12I11CA')[$i]."frm1702RT:txtPg8Sc12I11CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I11CB-".$no."=".request('frm1702RT:txtPg8Sc12I11CB')[$i]."frm1702RT:txtPg8Sc12I11CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I12CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I12CA')[$i])."frm1702RT:txtPg8Sc12I12CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I12CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I12CB')[$i])."frm1702RT:txtPg8Sc12I12CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I13CADate".$no."=".request('frm1702RT:txtPg8Sc12I13CADate')[$i]."frm1702RT:txtPg8Sc12I13CADate".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I13CBDate".$no."=".request('frm1702RT:txtPg8Sc12I13CBDate')[$i]."frm1702RT:txtPg8Sc12I13CBDate".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I14CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I14CA')[$i])."frm1702RT:txtPg8Sc12I14CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I14CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I14CB')[$i])."frm1702RT:txtPg8Sc12I14CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I15CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I15CA')[$i])."frm1702RT:txtPg8Sc12I15CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I15CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I15CB')[$i])."frm1702RT:txtPg8Sc12I15CB-".$no."=</div>	
            ";
			}
		}

		$xml_sched12_4 = "";
		if(request('frm1702RT:txtCtrmodalPg8Sc12IV') != "0"){
			$total = count(request('frm1702RT:txtPg8Sc12I16CA')) / 2;
			$num = 0; 
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc12I16CA')); $i++) {
				$no =  ($num++ % $total) + 1; 
				$xml_sched12_4 .= "<div>frm1702RT:txtPg8Sc12I16CA-".$no."=".request('frm1702RT:txtPg8Sc12I16CA')[$i]."frm1702RT:txtPg8Sc12I16CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I16CB-".$no."=".request('frm1702RT:txtPg8Sc12I16CB')[$i]."frm1702RT:txtPg8Sc12I16CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I17CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I17CA')[$i])."frm1702RT:txtPg8Sc12I17CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I17CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I17CB')[$i])."frm1702RT:txtPg8Sc12I17CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I18CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I18CA')[$i])."frm1702RT:txtPg8Sc12I18CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc12I18CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I18CB')[$i])."frm1702RT:txtPg8Sc12I18CB-".$no."=</div>	
            "; 
			}
		}

		$xml_sched13_1 = "";
		if(request('frm1702RT:txtCtrmodalPg8Sc13I') != "0"){
			$total = count(request('frm1702RT:txtPg8Sc13I2CA')) / 2;
			$num = 0;
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc13I2CA')); $i++) { 
				$no =  ($num++ % $total) + 1; 
				$xml_sched13_1 .= "<div>frm1702RT:txtPg8Sc13I2CA-".$no."=".request('frm1702RT:txtPg8Sc13I2CA')[$i]."frm1702RT:txtPg8Sc13I2CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I2CB-".$no."=".request('frm1702RT:txtPg8Sc13I2CB')[$i]."frm1702RT:txtPg8Sc13I2CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I3CA-".$no."=".request('frm1702RT:txtPg8Sc13I3CA')[$i]."frm1702RT:txtPg8Sc13I3CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I3CB-".$no."=".request('frm1702RT:txtPg8Sc13I3CB')[$i]."frm1702RT:txtPg8Sc13I3CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I4CA-".$no."=".request('frm1702RT:txtPg8Sc13I4CA')[$i]."frm1702RT:txtPg8Sc13I4CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I4CB-".$no."=".request('frm1702RT:txtPg8Sc13I4CB')[$i]."frm1702RT:txtPg8Sc13I4CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I5CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I5CA')[$i])."frm1702RT:txtPg8Sc13I5CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I5CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I5CB')[$i])."frm1702RT:txtPg8Sc13I5CB-".$no."=</div>	
            ";
			}
		}

		$xml_sched13_2 = "";
		if(request('frm1702RT:txtCtrmodalPg8Sc13II') != "0"){
			$total = count(request('frm1702RT:txtPg8Sc13I6CA')) / 2;
			$num = 0;
			for ($i=0; $i < count(request('frm1702RT:txtPg8Sc13I6CA')); $i++) {
				$no =  ($num++ % $total) + 1; 
				$xml_sched13_2 .= "<div>frm1702RT:txtPg8Sc13I6CA-".$no."=".request('frm1702RT:txtPg8Sc13I6CA')[$i]."frm1702RT:txtPg8Sc13I6CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I6CB-".$no."=".request('frm1702RT:txtPg8Sc13I6CB')[$i]."frm1702RT:txtPg8Sc13I6CB-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I7CA-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I7CA')[$i])."frm1702RT:txtPg8Sc13I7CA-".$no."=</div>	
            <div>frm1702RT:txtPg8Sc13I7CB-".$no."=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I7CB')[$i])."frm1702RT:txtPg8Sc13I7CB-".$no."=</div>	
            ";
			}
		}
		$xmlData ="<?xml version='1.0'?>	
            <div>frm1702RT:rdoPg1I1Calendar=".$rdoPg1I1Calendar."frm1702RT:rdoPg1I1Calendar=</div>	
            <div>frm1702RT:rdoPg1I1Fiscal=".$rdoPg1I1Fiscal."frm1702RT:rdoPg1I1Fiscal=</div>	
            <div>frm1702RT:ddlPg1I2Month=".request('frm1702RT:ddlPg1I2Month')."frm1702RT:ddlPg1I2Month=</div>	
            <div>frm1702RT:txtPg1I2Year=".request('frm1702RT:txtPg1I2Year')."frm1702RT:txtPg1I2Year=</div>	
            <div>frm1702RT:rdoPg1I2AmmendYes=".$rdoPg1I2AmmendYes."frm1702RT:rdoPg1I2AmmendYes=</div>	
            <div>frm1702RT:rdoPg1I2AmmendNo=".$rdoPg1I2AmmendNo."frm1702RT:rdoPg1I2AmmendNo=</div>	
            <div>frm1702RT:rdoPg1I4ShortPeriodYes=".$rdoPg1I4ShortPeriodYes."frm1702RT:rdoPg1I4ShortPeriodYes=</div>	
            <div>frm1702RT:rdoPg1I4ShortPeriodNo=".$rdoPg1I4ShortPeriodNo."frm1702RT:rdoPg1I4ShortPeriodNo=</div>	
            <div>frm1702RT:rdoPg1I5Atc=falsefrm1702RT:rdoPg1I5Atc=</div>	
            <div>frm1702RT:drpPg1I5AtcOther=".request('frm1702RT:drpPg1I5AtcOther')."frm1702RT:drpPg1I5AtcOther=</div>	
            <div>frm1702RT:rdoPg1I5AtcOther=".$rdoPg1I5AtcOther."frm1702RT:rdoPg1I5AtcOther=</div>	
            <div>frm1702RT:txtPg1Pt1I6TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg1Pt1I6TIN1=</div>	
            <div>frm1702RT:txtPg1Pt1I6TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg1Pt1I6TIN2=</div>	
            <div>frm1702RT:txtPg1Pt1I6TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg1Pt1I6TIN3=</div>	
            <div>frm1702RT:txtPg1Pt1I6TIN4=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg1Pt1I6TIN4=</div>	
            <div>BranchMaskP1=".request('BranchMaskP1')."BranchMaskP1=</div>	
            <div>frm1702RT:txtPg1Pt1I7RDO=".request('frm1702RT:drpPg1Pt1I7RDOCode')."frm1702RT:txtPg1Pt1I7RDO=</div>	
            <div>frm1702RT:drpPg1Pt1I7RDOCode=".request('frm1702RT:drpPg1Pt1I7RDOCode')."frm1702RT:drpPg1Pt1I7RDOCode=</div>	
            <div>frm1702RT:txtPg1Pt1I8=".request('frm1702RT:Month')."frm1702RT:txtPg1Pt1I8=</div>	
            <div>frm1702RT:txtPg1Pt1I9Name=".$taxPayerName."frm1702RT:txtPg1Pt1I9Name=</div>	
            <div>frm1702RT:txtPg1Pt1I10Address=".$address."frm1702RT:txtPg1Pt1I10Address=</div>	
            <div>frm1702RT:txtZIP=".request('frm1702RT:txtZIP')."frm1702RT:txtZIP=</div>	
            <div>frm1702RT:txtPg1Pt1I11Contact=".request('frm1702RT:txtPg1Pt1I11Contact')."frm1702RT:txtPg1Pt1I11Contact=</div>	
            <div>frm1702RT:txtPg1Pt1I12Email=".request('frm1702RT:txtPg1Pt1I12Email')."frm1702RT:txtPg1Pt1I12Email=</div>	
            <div>frm1702RT:txtPg1Pt1I13Business=".$lineBusiness."frm1702RT:txtPg1Pt1I13Business=</div>	
            <div>frm1702RT:txtPg1Pt1I14PSIC=".request('frm1702RT:txtPg1Pt1I14PSIC')."frm1702RT:txtPg1Pt1I14PSIC=</div>	
            <div>frm1702RT:rdoPg1Pt1I15ItemizedDeduction=".$rdoPg1Pt1I15ItemizedDeduction."frm1702RT:rdoPg1Pt1I15ItemizedDeduction=</div>	
            <div>frm1702RT:rdoPg1Pt1I15OptionalStandard=".$rdoPg1Pt1I15OptionalStandard."frm1702RT:rdoPg1Pt1I15OptionalStandard=</div>	
            <div>frm1702RT:txtPg1Pt2I16IncomeTax=".request('frm1702RT:txtPg1Pt2I16IncomeTax')."frm1702RT:txtPg1Pt2I16IncomeTax=</div>	
            <div>frm1702RT:txtPg1Pt2I17TotalTaxCredits=".request('frm1702RT:txtPg1Pt2I17TotalTaxCredits')."frm1702RT:txtPg1Pt2I17TotalTaxCredits=</div>	
            <div>frm1702RT:txtPg1Pt2I18NetTax=".str_replace(',', '', request('frm1702RT:txtPg1Pt2I18NetTax'))."frm1702RT:txtPg1Pt2I18NetTax=</div>	
            <div>frm1702RT:txtPg1Pt2I19TotalPenalties=".str_replace(',', '', request('frm1702RT:txtPg1Pt2I19TotalPenalties'))."frm1702RT:txtPg1Pt2I19TotalPenalties=</div>	
            <div>frm1702RT:txtPg1Pt2I20TotalAmount=".str_replace(',', '', request('frm1702RT:txtPg1Pt2I20TotalAmount'))."frm1702RT:txtPg1Pt2I20TotalAmount=</div>	
            <div>frm1702RT:rdoPg1Pt2I21OverpaymentRefunded=".$rdoPg1Pt2I21OverpaymentRefunded."frm1702RT:rdoPg1Pt2I21OverpaymentRefunded=</div>	
            <div>frm1702RT:rdoPg1Pt2I21OverpaymentIssued=".$rdoPg1Pt2I21OverpaymentIssued."frm1702RT:rdoPg1Pt2I21OverpaymentIssued=</div>	
            <div>frm1702RT:rdoPg1Pt2I21OverpaymentCarried=".$rdoPg1Pt2I21OverpaymentCarried."frm1702RT:rdoPg1Pt2I21OverpaymentCarried=</div>	
            <div>frm1702RT:txtSignaturePresident=frm1702RT:txtSignaturePresident=</div>	
            <div>frm1702RT:txtSignatureTreasurer=frm1702RT:txtSignatureTreasurer=</div>	
            <div>frm1702RT:txtPg1Pt2Signatory=frm1702RT:txtPg1Pt2Signatory=</div>	
            <div>frm1702RT:txtPg1Pt2PagesFilled=8frm1702RT:txtPg1Pt2PagesFilled=</div>	
            <div>frm1702RT:rdoPg1Pt2I22CTC=".$rdoPg1Pt2I22CTC."frm1702RT:rdoPg1Pt2I22CTC=</div>	
            <div>frm1702RT:rdoPg1Pt2I22SEC=".$rdoPg1Pt2I22SEC."frm1702RT:rdoPg1Pt2I22SEC=</div>	
            <div>frm1702RT:txtPg1Pt2I22CTC=".request('frm1702RT:txtPg1Pt2I22CTC')."frm1702RT:txtPg1Pt2I22CTC=</div>	
            <div>frm1702RT:txtPg1Pt2I23Date=".request('frm1702RT:txtPg1Pt2I23Date')."frm1702RT:txtPg1Pt2I23Date=</div>	
            <div>frm1702RT:txtPg1Pt2I24PlaceOfIssue=".request('frm1702RT:txtPg1Pt2I24PlaceOfIssue')."frm1702RT:txtPg1Pt2I24PlaceOfIssue=</div>	
            <div>frm1702RT:txtPg1Pt2I25AmountCTC=".request('frm1702RT:txtPg1Pt2I25AmountCTC')."frm1702RT:txtPg1Pt2I25AmountCTC=</div>	
            <div>frm1702RT:txtPg1Pt3I26DebitMemoC1=".request('frm1702RT:txtPg1Pt3I26DebitMemoC1')."frm1702RT:txtPg1Pt3I26DebitMemoC1=</div>	
            <div>frm1702RT:txtPg1Pt3I26DebitMemoC2=".request('frm1702RT:txtPg1Pt3I26DebitMemoC2')."frm1702RT:txtPg1Pt3I26DebitMemoC2=</div>	
            <div>frm1702RT:txtPg1Pt3I26DebitMemoC3Date=".request('frm1702RT:txtPg1Pt3I26DebitMemoC3Date')."frm1702RT:txtPg1Pt3I26DebitMemoC3Date=</div>	
            <div>frm1702RT:txtPg1Pt3I26DebitMemoC4Amount=".request('frm1702RT:txtPg1Pt3I26DebitMemoC4Amount')."frm1702RT:txtPg1Pt3I26DebitMemoC4Amount=</div>	
            <div>frm1702RT:txtPg1Pt3I27CheckC1=".request('frm1702RT:txtPg1Pt3I27CheckC1')."frm1702RT:txtPg1Pt3I27CheckC1=</div>	
            <div>frm1702RT:txtPg1Pt3I27CheckC2=".request('frm1702RT:txtPg1Pt3I27CheckC2')."frm1702RT:txtPg1Pt3I27CheckC2=</div>	
            <div>frm1702RT:txtPg1Pt3I27CheckC3Date=".request('frm1702RT:txtPg1Pt3I27CheckC3Date')."frm1702RT:txtPg1Pt3I27CheckC3Date=</div>	
            <div>frm1702RT:txtPg1Pt3I27CheckC4Amount=".request('frm1702RT:txtPg1Pt3I27CheckC4Amount')."frm1702RT:txtPg1Pt3I27CheckC4Amount=</div>	
            <div>frm1702RT:txtPg1Pt3I28TaxDebitC2=".request('frm1702RT:txtPg1Pt3I28TaxDebitC2')."frm1702RT:txtPg1Pt3I28TaxDebitC2=</div>	
            <div>frm1702RT:txtPg1Pt3I28TaxDebitDate=".request('frm1702RT:txtPg1Pt3I28TaxDebitDate')."frm1702RT:txtPg1Pt3I28TaxDebitDate=</div>	
            <div>frm1702RT:txtPg1Pt3I28TaxDebitC4Amount=".request('frm1702RT:txtPg1Pt3I28TaxDebitC4Amount')."frm1702RT:txtPg1Pt3I28TaxDebitC4Amount=</div>	
            <div>frm1702RT:txtPg1Pt3I29Others=".request('frm1702RT:txtPg1Pt3I29Others')."frm1702RT:txtPg1Pt3I29Others=</div>	
            <div>frm1702RT:txtPg1Pt3I29OthersC1=".request('frm1702RT:txtPg1Pt3I29OthersC1')."frm1702RT:txtPg1Pt3I29OthersC1=</div>	
            <div>frm1702RT:txtPg1Pt3I29OthersC2=".request('frm1702RT:txtPg1Pt3I29OthersC2')."frm1702RT:txtPg1Pt3I29OthersC2=</div>	
            <div>frm1702RT:txtPg1Pt3I29OthersC3Date=".request('frm1702RT:txtPg1Pt3I29OthersC3Date')."frm1702RT:txtPg1Pt3I29OthersC3Date=</div>	
            <div>frm1702RT:txtPg1Pt3I29OthersC4Amount=".request('frm1702RT:txtPg1Pt3I29OthersC4Amount')."frm1702RT:txtPg1Pt3I29OthersC4Amount=</div>	
            <div>frm1702RT:txtPg2TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg2TIN1=</div>	
            <div>frm1702RT:txtPg2TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg2TIN2=</div>	
            <div>frm1702RT:txtPg2TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg2TIN3=</div>	
            <div>frm1702RT:txtPg2TIN4=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg2TIN4=</div>	
            <div>txtBranchMaskP2=".request('txtBranchMaskP2')."txtBranchMaskP2=</div>	
            <div>frm1702RT:txtPg2RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg2RegisteredName=</div>	
            <div>frm1702RT:txtPg2Pt4I30NetSales=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I30NetSales'))."frm1702RT:txtPg2Pt4I30NetSales=</div>	
            <div>frm1702RT:txtPg2Pt4I31LessCost=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I31LessCost'))."frm1702RT:txtPg2Pt4I31LessCost=</div>	
            <div>frm1702RT:txtPg2Pt4I32GrossIncome=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I32GrossIncome'))."frm1702RT:txtPg2Pt4I32GrossIncome=</div>	
            <div>frm1702RT:txtPg2Pt4I33AddOtherTaxable=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I33AddOtherTaxable'))."frm1702RT:txtPg2Pt4I33AddOtherTaxable=</div>	
            <div>frm1702RT:txtPg2Pt4I34TotalGross=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I34TotalGross'))."frm1702RT:txtPg2Pt4I34TotalGross=</div>	
            <div>frm1702RT:txtPg2Pt4I35OrdinaryAllowable=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I35OrdinaryAllowable'))."frm1702RT:txtPg2Pt4I35OrdinaryAllowable=</div>	
            <div>frm1702RT:txtPg2Pt4I36SpecialAllowable=".request('frm1702RT:txtPg2Pt4I36SpecialAllowable')."frm1702RT:txtPg2Pt4I36SpecialAllowable=</div>	
            <div>frm1702RT:txtPg2Pt4I37Nolco=".request('frm1702RT:txtPg2Pt4I37Nolco')."frm1702RT:txtPg2Pt4I37Nolco=</div>	
            <div>frm1702RT:txtPg2Pt4I38TotalItemized=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I38TotalItemized'))."frm1702RT:txtPg2Pt4I38TotalItemized=</div>	
            <div>frm1702RT:txtPg2Pt4I39OptionalStandard=".request('frm1702RT:txtPg2Pt4I39OptionalStandard')."frm1702RT:txtPg2Pt4I39OptionalStandard=</div>	
            <div>frm1702RT:txtPg2Pt4I40NetTaxable=".str_replace(',', '',request('frm1702RT:txtPg2Pt4I40NetTaxable'))."frm1702RT:txtPg2Pt4I40NetTaxable=</div>	
            <div>frm1702RT:txtPg2Pt4I42IncomeTaxDue=".request('frm1702RT:txtPg2Pt4I42IncomeTaxDue')."frm1702RT:txtPg2Pt4I42IncomeTaxDue=</div>	
            <div>frm1702RT:txtPg2Pt4I43MinimumCorporate=".request('frm1702RT:txtPg2Pt4I43MinimumCorporate')."frm1702RT:txtPg2Pt4I43MinimumCorporate=</div>	
            <div>frm1702RT:txtPg2Pt4I44TotalIncomeTax=".request('frm1702RT:txtPg2Pt4I44TotalIncomeTax')."frm1702RT:txtPg2Pt4I44TotalIncomeTax=</div>	
            <div>frm1702RT:txtPg2Pt4I45LessTotalTax=".request('frm1702RT:txtPg2Pt4I45LessTotalTax')."frm1702RT:txtPg2Pt4I45LessTotalTax=</div>	
            <div>frm1702RT:txtPg2Pt4I46NetTax=".request('frm1702RT:txtPg2Pt4I46NetTax')."frm1702RT:txtPg2Pt4I46NetTax=</div>	
            <div>frm1702RT:txtPg2Pt4I47Surcharge=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I47Surcharge'))."frm1702RT:txtPg2Pt4I47Surcharge=</div>	
            <div>frm1702RT:txtPg2Pt4I48Interest=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I48Interest'))."frm1702RT:txtPg2Pt4I48Interest=</div>	
            <div>frm1702RT:txtPg2Pt4I49Compromise=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I49Compromise'))."frm1702RT:txtPg2Pt4I49Compromise=</div>	
            <div>frm1702RT:txtPg2Pt4I50TotalPenalties=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I50TotalPenalties'))."frm1702RT:txtPg2Pt4I50TotalPenalties=</div>	
            <div>frm1702RT:txtPg2Pt4I51TotalAmount=".str_replace(',', '', request('frm1702RT:txtPg2Pt4I51TotalAmount'))."frm1702RT:txtPg2Pt4I51TotalAmount=</div>	
            <div>frm1702RT:txtPg2Pt5I52SpecialAllowable=".request('frm1702RT:txtPg2Pt5I52SpecialAllowable')."frm1702RT:txtPg2Pt5I52SpecialAllowable=</div>	
            <div>frm1702RT:txtPg2Pt5I53AddSpecialTax=".request('frm1702RT:txtPg2Pt5I53AddSpecialTax')."frm1702RT:txtPg2Pt5I53AddSpecialTax=</div>	
            <div>frm1702RT:txtPg2Pt5I54TotalTax=".request('frm1702RT:txtPg2Pt5I54TotalTax')."frm1702RT:txtPg2Pt5I54TotalTax=</div>	
            <div>frm1702RT:txtPg2Pt6I55Name=".request('frm1702RT:txtPg2Pt6I55Name')."frm1702RT:txtPg2Pt6I55Name=</div>	
            <div>frm1702RT:txtPg2Pt6I56TIN1=".request('frm1702RT:txtPg2Pt6I56TIN1')."frm1702RT:txtPg2Pt6I56TIN1=</div>	
            <div>frm1702RT:txtPg2Pt6I56TIN2=".request('frm1702RT:txtPg2Pt6I56TIN2')."frm1702RT:txtPg2Pt6I56TIN2=</div>	
            <div>frm1702RT:txtPg2Pt6I56TIN3=".request('frm1702RT:txtPg2Pt6I56TIN3')."frm1702RT:txtPg2Pt6I56TIN3=</div>	
            <div>frm1702RT:txtPg2Pt6I56TIN4=".request('frm1702RT:txtPg2Pt6I56TIN4')."frm1702RT:txtPg2Pt6I56TIN4=</div>	
            <div>frm1702RT:txtPg2Pt6I57Name=".request('frm1702RT:txtPg2Pt6I57Name')."frm1702RT:txtPg2Pt6I57Name=</div>	
            <div>frm1702RT:txtPg2Pt6I58TIN1=".request('frm1702RT:txtPg2Pt6I58TIN1')."frm1702RT:txtPg2Pt6I58TIN1=</div>	
            <div>frm1702RT:txtPg2Pt6I58TIN2=".request('frm1702RT:txtPg2Pt6I58TIN2')."frm1702RT:txtPg2Pt6I58TIN2=</div>	
            <div>frm1702RT:txtPg2Pt6I58TIN3=".request('frm1702RT:txtPg2Pt6I58TIN3')."frm1702RT:txtPg2Pt6I58TIN3=</div>	
            <div>frm1702RT:txtPg2Pt6I58TIN4=".request('frm1702RT:txtPg2Pt6I58TIN4')."frm1702RT:txtPg2Pt6I58TIN4=</div>	
            <div>frm1702RT:txtPg2Pt6I59BIR1=".request('frm1702RT:txtPg2Pt6I59BIR1')."frm1702RT:txtPg2Pt6I59BIR1=</div>	
            <div>frm1702RT:txtPg2Pt6I59BIR2=".request('frm1702RT:txtPg2Pt6I59BIR2')."frm1702RT:txtPg2Pt6I59BIR2=</div>	
            <div>frm1702RT:txtPg2Pt6I59BIR3=".request('frm1702RT:txtPg2Pt6I59BIR3')."frm1702RT:txtPg2Pt6I59BIR3=</div>	
            <div>frm1702RT:txtPg2Pt6I59BIR4=".request('frm1702RT:txtPg2Pt6I59BIR4')."frm1702RT:txtPg2Pt6I59BIR4=</div>	
            <div>frm1702RT:txtPg2Pt6I60IssueDate=".request('frm1702RT:txtPg2Pt6I60IssueDate')."frm1702RT:txtPg2Pt6I60IssueDate=</div>	
            <div>frm1702RT:txtPg2Pt6I61ExpiryDate=".request('frm1702RT:txtPg2Pt6I61ExpiryDate')."frm1702RT:txtPg2Pt6I61ExpiryDate=</div>	
            <div>frm1702RT:txtPg3TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg3TIN1=</div>	
            <div>frm1702RT:txtPg3TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg3TIN2=</div>	
            <div>frm1702RT:txtPg3TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg3TIN3=</div>	
            <div>frm1702RT:txtPg3TIN4=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg3TIN4=</div>	
            <div>txtBranchMaskP3=".request('txtBranchMaskP3')."txtBranchMaskP3=</div>	
            <div>frm1702RT:txtPg3RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg3RegisteredName=</div>	
            <div>frm1702RT:txtPg3Sc1I1GoodsProp=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I1GoodsProp'))."frm1702RT:txtPg3Sc1I1GoodsProp=</div>	
            <div>frm1702RT:txtPg3Sc1I2SaleServices=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I2SaleServices'))."frm1702RT:txtPg3Sc1I2SaleServices=</div>	
            <div>frm1702RT:txtPg3Sc1I3LeaseProp=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I3LeaseProp'))."frm1702RT:txtPg3Sc1I3LeaseProp=</div>	
            <div>frm1702RT:txtPg3Sc1I4Total=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I4Total'))."frm1702RT:txtPg3Sc1I4Total=</div>	
            <div>frm1702RT:txtPg3Sc1I5LessSales=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I5LessSales'))."frm1702RT:txtPg3Sc1I5LessSales=</div>	
            <div>frm1702RT:txtPg3Sc1I6NetSales=".str_replace(',', '',request('frm1702RT:txtPg3Sc1I6NetSales'))."frm1702RT:txtPg3Sc1I6NetSales=</div>	
            <div>frm1702RT:txtPg3Sc2I1MerchInventory=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I1MerchInventory'))."frm1702RT:txtPg3Sc2I1MerchInventory=</div>	
            <div>frm1702RT:txtPg3Sc2I2AddPurchases=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I2AddPurchases'))."frm1702RT:txtPg3Sc2I2AddPurchases=</div>	
            <div>frm1702RT:txtPg3Sc2I3TotalGoods=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I3TotalGoods'))."frm1702RT:txtPg3Sc2I3TotalGoods=</div>	
            <div>frm1702RT:txtPg3Sc2I4LessMerch=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I4LessMerch'))."frm1702RT:txtPg3Sc2I4LessMerch=</div>	
            <div>frm1702RT:txtPg3Sc2I5CostofSales=".request('frm1702RT:txtPg3Sc2I5CostofSales')."frm1702RT:txtPg3Sc2I5CostofSales=</div>	
            <div>frm1702RT:txtPg3Sc2I6DirectMaterials=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I6DirectMaterials'))."frm1702RT:txtPg3Sc2I6DirectMaterials=</div>	
            <div>frm1702RT:txtPg3Sc2I7AddPurchases=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I7AddPurchases'))."frm1702RT:txtPg3Sc2I7AddPurchases=</div>	
            <div>frm1702RT:txtPg3Sc2I8MaterialsAvaliable=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I8MaterialsAvaliable'))."frm1702RT:txtPg3Sc2I8MaterialsAvaliable=</div>	
            <div>frm1702RT:txtPg3Sc2I9LessDirectMat=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I9LessDirectMat'))."frm1702RT:txtPg3Sc2I9LessDirectMat=</div>	
            <div>frm1702RT:txtPg3Sc2I10RawMatUsed=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I10RawMatUsed'))."frm1702RT:txtPg3Sc2I10RawMatUsed=</div>	
            <div>frm1702RT:txtPg3Sc2I11DirectLabor=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I11DirectLabor'))."frm1702RT:txtPg3Sc2I11DirectLabor=</div>	
            <div>frm1702RT:txtPg3Sc2I12ManOverhead=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I12ManOverhead'))."frm1702RT:txtPg3Sc2I12ManOverhead=</div>	
            <div>frm1702RT:txtPg3Sc2I13TotalManCost=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I13TotalManCost'))."frm1702RT:txtPg3Sc2I13TotalManCost=</div>	
            <div>frm1702RT:txtPg3Sc2I14WorkProcess=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I14WorkProcess'))."frm1702RT:txtPg3Sc2I14WorkProcess=</div>	
            <div>frm1702RT:txtPg3Sc2I15LessWorkProcess=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I15LessWorkProcess'))."frm1702RT:txtPg3Sc2I15LessWorkProcess=</div>	
            <div>frm1702RT:txtPg3Sc2I16CostOfGoods=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I16CostOfGoods'))."frm1702RT:txtPg3Sc2I16CostOfGoods=</div>	
            <div>frm1702RT:txtPg3Sc2I17FinishedGoods=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I17FinishedGoods'))."frm1702RT:txtPg3Sc2I17FinishedGoods=</div>	
            <div>frm1702RT:txtPg3Sc2I18LessFinishGoods=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I18LessFinishGoods'))."frm1702RT:txtPg3Sc2I18LessFinishGoods=</div>	
            <div>frm1702RT:txtPg3Sc2I19CostOfGoods=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I19CostOfGoods'))."frm1702RT:txtPg3Sc2I19CostOfGoods=</div>	
            <div>frm1702RT:txtPg3Sc2I20DirectSalaries=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I20DirectSalaries'))."frm1702RT:txtPg3Sc2I20DirectSalaries=</div>	
            <div>frm1702RT:txtPg3Sc2I21DirectMaterials=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I21DirectMaterials'))."frm1702RT:txtPg3Sc2I21DirectMaterials=</div>	
            <div>frm1702RT:txtPg3Sc2I22DirectDepreciation=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I22DirectDepreciation'))."frm1702RT:txtPg3Sc2I22DirectDepreciation=</div>	
            <div>frm1702RT:txtPg3Sc2I23DirectRental=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I23DirectRental'))."frm1702RT:txtPg3Sc2I23DirectRental=</div>	
            <div>frm1702RT:txtPg3Sc2I24DirectOutside=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I24DirectOutside'))."frm1702RT:txtPg3Sc2I24DirectOutside=</div>	
            <div>frm1702RT:txtPg3Sc2I25DirectOthers=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I25DirectOthers'))."frm1702RT:txtPg3Sc2I25DirectOthers=</div>	
            <div>frm1702RT:txtPg3Sc2I26TotalService=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I26TotalService'))."frm1702RT:txtPg3Sc2I26TotalService=</div>	
            <div>frm1702RT:txtPg3Sc2I27TotalSales=".str_replace(',', '',request('frm1702RT:txtPg3Sc2I27TotalSales'))."frm1702RT:txtPg3Sc2I27TotalSales=</div>	
            <div>frm1702RT:txtPg4TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg4TIN1=</div>	
            <div>frm1702RT:txtPg4TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg4TIN2=</div>	
            <div>frm1702RT:txtPg4TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg4TIN3=</div>	
            <div>frm1702RT:txtPg4TIN4=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg4TIN4=</div>	
            <div>txtBranchMaskP4=".request('txtBranchMaskP4')."txtBranchMaskP4=</div>	
            <div>frm1702RT:txtPg4RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg4RegisteredName=</div>	
            <div>frm1702RT:txtPg4Sc3I1OtherTaxIncome=".request('frm1702RT:txtPg4Sc3I1OtherTaxIncome')."frm1702RT:txtPg4Sc3I1OtherTaxIncome=</div>	
            <div>frm1702RT:txtPg4Sc3I1OtherTaxAmount=".str_replace(',', '',request('frm1702RT:txtPg4Sc3I1OtherTaxAmount'))."frm1702RT:txtPg4Sc3I1OtherTaxAmount=</div>	
            <div>frm1702RT:txtPg4Sc3I2OtherTaxIncome=".request('frm1702RT:txtPg4Sc3I2OtherTaxIncome')."frm1702RT:txtPg4Sc3I2OtherTaxIncome=</div>	
            <div>frm1702RT:txtPg4Sc3I2OtherTaxAmount=".str_replace(',', '',request('frm1702RT:txtPg4Sc3I2OtherTaxAmount'))."frm1702RT:txtPg4Sc3I2OtherTaxAmount=</div>	
            <div>frm1702RT:txtPg4Sc3I3C1=".request('frm1702RT:txtPg4Sc3I3OtherTaxIncome')."frm1702RT:txtPg4Sc3I3C1=</div>	
            <div>frm1702RT:txtPg4Sc3I3C2=".str_replace(',', '',request('frm1702RT:txtPg4Sc3I3OtherTaxAmount'))."frm1702RT:txtPg4Sc3I3C2=</div>	
            <div>frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount=".str_replace(',', '',request('frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount'))."frm1702RT:txtPg4Sc3I4OtherTaxTotalAmount=</div>	
            <div>frm1702RT:txtPg4Sc4I1Advertising=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I1Advertising'))."frm1702RT:txtPg4Sc4I1Advertising=</div>	
            <div>frm1702RT:txtPg4Sc4I2Amortization=".request('frm1702RT:txtPg4Sc4I2Amortization')."frm1702RT:txtPg4Sc4I2Amortization=</div>	
            <div>frm1702RT:txtPg4Sc4I2AmortizationAmount=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I2AmortizationAmount'))."frm1702RT:txtPg4Sc4I2AmortizationAmount=</div>	
            <div>frm1702RT:txtPg4Sc4I3Amortization=".request('frm1702RT:txtPg4Sc4I3Amortization')."frm1702RT:txtPg4Sc4I3Amortization=</div>	
            <div>frm1702RT:txtPg4Sc4I3AmortizationAmount=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I3AmortizationAmount'))."frm1702RT:txtPg4Sc4I3AmortizationAmount=</div>	
            <div>frm1702RT:txtPg4Sc4I4C1=".request('frm1702RT:txtPg4Sc4I4Amortization')."frm1702RT:txtPg4Sc4I4C1=</div>	
            <div>frm1702RT:txtPg4Sc4I4C2=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I4AmortizationAmount'))."frm1702RT:txtPg4Sc4I4C2=</div>	
            <div>frm1702RT:txtPg4Sc4I5BadDebts=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I5BadDebts'))."frm1702RT:txtPg4Sc4I5BadDebts=</div>	
            <div>frm1702RT:txtPg4Sc4I6CharitableContributions=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I6CharitableContributions'))."frm1702RT:txtPg4Sc4I6CharitableContributions=</div>	
            <div>frm1702RT:txtPg4Sc4I7Commissions=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I7Commissions'))."frm1702RT:txtPg4Sc4I7Commissions=</div>	
            <div>frm1702RT:txtPg4Sc4I8Communication=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I8Communication'))."frm1702RT:txtPg4Sc4I8Communication=</div>	
            <div>frm1702RT:txtPg4Sc4I9Depletion=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I9Depletion'))."frm1702RT:txtPg4Sc4I9Depletion=</div>	
            <div>frm1702RT:txtPg4Sc4I10Depreciation=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I10Depreciation'))."frm1702RT:txtPg4Sc4I10Depreciation=</div>	
            <div>frm1702RT:txtPg4Sc4I11DirectorsFee=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I11DirectorsFee'))."frm1702RT:txtPg4Sc4I11DirectorsFee=</div>	
            <div>frm1702RT:txtPg4Sc4I12FringeBenefits=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I12FringeBenefits'))."frm1702RT:txtPg4Sc4I12FringeBenefits=</div>	
            <div>frm1702RT:txtPg4Sc4I13Fuel=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I13Fuel'))."frm1702RT:txtPg4Sc4I13Fuel=</div>	
            <div>frm1702RT:txtPg4Sc4I14Insurance=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I14Insurance'))."frm1702RT:txtPg4Sc4I14Insurance=</div>	
            <div>frm1702RT:txtPg4Sc4I15Interest=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I15Interest'))."frm1702RT:txtPg4Sc4I15Interest=</div>	
            <div>frm1702RT:txtPg4Sc4I16Janitorial=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I16Janitorial'))."frm1702RT:txtPg4Sc4I16Janitorial=</div>	
            <div>frm1702RT:txtPg4Sc4I17Losses=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I17Losses'))."frm1702RT:txtPg4Sc4I17Losses=</div>	
            <div>frm1702RT:txtPg4Sc4I18Management=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I18Management'))."frm1702RT:txtPg4Sc4I18Management=</div>	
            <div>frm1702RT:txtPg4Sc4I19Miscellaneous=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I19Miscellaneous'))."frm1702RT:txtPg4Sc4I19Miscellaneous=</div>	
            <div>frm1702RT:txtPg4Sc4I20OfficeSupplies=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I20OfficeSupplies'))."frm1702RT:txtPg4Sc4I20OfficeSupplies=</div>	
            <div>frm1702RT:txtPg4Sc4I21OtherServices=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I21OtherServices'))."frm1702RT:txtPg4Sc4I21OtherServices=</div>	
            <div>frm1702RT:txtPg4Sc4I22ProfessionalFees=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I22ProfessionalFees'))."frm1702RT:txtPg4Sc4I22ProfessionalFees=</div>	
            <div>frm1702RT:txtPg4Sc4I23Rental=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I23Rental'))."frm1702RT:txtPg4Sc4I23Rental=</div>	
            <div>frm1702RT:txtPg4Sc4I24Repairs=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I24Repairs'))."frm1702RT:txtPg4Sc4I24Repairs=</div>	
            <div>frm1702RT:txtPg4Sc4I25Repairs=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I25Repairs'))."frm1702RT:txtPg4Sc4I25Repairs=</div>	
            <div>frm1702RT:txtPg4Sc4I26Representation=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I26Representation'))."frm1702RT:txtPg4Sc4I26Representation=</div>	
            <div>frm1702RT:txtPg4Sc4I27Research=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I27Research'))."frm1702RT:txtPg4Sc4I27Research=</div>	
            <div>frm1702RT:txtPg4Sc4I28Royalties=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I28Royalties'))."frm1702RT:txtPg4Sc4I28Royalties=</div>	
            <div>frm1702RT:txtPg4Sc4I29Salaries=".str_replace(',', '',request('frm1702RT:txtPg4Sc4I29Salaries'))."frm1702RT:txtPg4Sc4I29Salaries=</div>	
            <div>frm1702RT:txtPg5TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg5TIN1=</div>	
            <div>frm1702RT:txtPg5TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg5TIN2=</div>	
            <div>frm1702RT:txtPg5TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg5TIN3=</div>	
            <div>frm1702RT:txtPg5BranchCode=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg5BranchCode=</div>	
            <div>txtBranchMaskP5=".request('txtBranchMaskP5')."txtBranchMaskP5=</div>	
            <div>frm1702RT:txtPg5RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg5RegisteredName=</div>	
            <div>frm1702RT:txtPg5Sc4I30SecurityServices=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I30SecurityServices'))."frm1702RT:txtPg5Sc4I30SecurityServices=</div>	
            <div>frm1702RT:txtPg5Sc4I31Contributions=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I31Contributions'))."frm1702RT:txtPg5Sc4I31Contributions=</div>	
            <div>frm1702RT:txtPg5Sc4I32TaxesandLicenses=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I32TaxesandLicenses'))."frm1702RT:txtPg5Sc4I32TaxesandLicenses=</div>	
            <div>frm1702RT:txtPg5Sc4I33TollingFees=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I33TollingFees'))."frm1702RT:txtPg5Sc4I33TollingFees=</div>	
            <div>frm1702RT:txtPg5Sc4I34TrainingandSeminars=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I34TrainingandSeminars'))."frm1702RT:txtPg5Sc4I34TrainingandSeminars=</div>	
            <div>frm1702RT:txtPg5Sc4I35TransportationandTravel=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I35TransportationandTravel'))."frm1702RT:txtPg5Sc4I35TransportationandTravel=</div>	
            <div>frm1702RT:txtPg5Sc4I36C1=".request('frm1702RT:txtPg5Sc4I36C1')."frm1702RT:txtPg5Sc4I36C1=</div>	
            <div>frm1702RT:txtPg5Sc4I36C2=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I36C2'))."frm1702RT:txtPg5Sc4I36C2=</div>	
            <div>frm1702RT:txtPg5Sc4I37C1=".request('frm1702RT:txtPg5Sc4I37C1')."frm1702RT:txtPg5Sc4I37C1=</div>	
            <div>frm1702RT:txtPg5Sc4I37C2=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I37C2'))."frm1702RT:txtPg5Sc4I37C2=</div>	
            <div>frm1702RT:txtPg5Sc4I38C1=".request('frm1702RT:txtPg5Sc4I38C1')."frm1702RT:txtPg5Sc4I38C1=</div>	
            <div>frm1702RT:txtPg5Sc4I38C2=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I38C2'))."frm1702RT:txtPg5Sc4I38C2=</div>	
            <div>frm1702RT:txtPg5Sc4I39C1=".request('frm1702RT:txtPg5Sc4I39C1')."frm1702RT:txtPg5Sc4I39C1=</div>	
            <div>frm1702RT:txtPg5Sc4I39C2=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I39C2'))."frm1702RT:txtPg5Sc4I39C2=</div>	
            <div>frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable=".str_replace(',', '',request('frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable'))."frm1702RT:txtPg5Sc4I40TotalOrdinaryAllowable=</div>	
            <div>frm1702RT:txtPg5Sc5I1C1=".request('frm1702RT:txtPg5Sc5I1C1')."frm1702RT:txtPg5Sc5I1C1=</div>	
            <div>frm1702RT:txtPg5Sc5I1C2=".request('frm1702RT:txtPg5Sc5I1C2')."frm1702RT:txtPg5Sc5I1C2=</div>	
            <div>frm1702RT:txtPg5Sc5I1C3=".request('frm1702RT:txtPg5Sc5I1C3')."frm1702RT:txtPg5Sc5I1C3=</div>	
            <div>frm1702RT:txtPg5Sc5I2C1=".request('frm1702RT:txtPg5Sc5I2C1')."frm1702RT:txtPg5Sc5I2C1=</div>	
            <div>frm1702RT:txtPg5Sc5I2C2=".request('frm1702RT:txtPg5Sc5I2C2')."frm1702RT:txtPg5Sc5I2C2=</div>	
            <div>frm1702RT:txtPg5Sc5I2C3=".request('frm1702RT:txtPg5Sc5I2C3')."frm1702RT:txtPg5Sc5I2C3=</div>	
            <div>frm1702RT:txtPg5Sc5I3C1=".request('frm1702RT:txtPg5Sc5I3C1')."frm1702RT:txtPg5Sc5I3C1=</div>	
            <div>frm1702RT:txtPg5Sc5I3C2=".request('frm1702RT:txtPg5Sc5I3C2')."frm1702RT:txtPg5Sc5I3C2=</div>	
            <div>frm1702RT:txtPg5Sc5I3C3=".request('frm1702RT:txtPg5Sc5I3C3')."frm1702RT:txtPg5Sc5I3C3=</div>	
            <div>frm1702RT:txtPg5Sc5I4C1=".request('frm1702RT:txtPg5Sc5I4C1')."frm1702RT:txtPg5Sc5I4C1=</div>	
            <div>frm1702RT:txtPg5Sc5I4C2=".request('frm1702RT:txtPg5Sc5I4C2')."frm1702RT:txtPg5Sc5I4C2=</div>	
            <div>frm1702RT:txtPg5Sc5I4C3=".request('frm1702RT:txtPg5Sc5I4C3')."frm1702RT:txtPg5Sc5I4C3=</div>	
            <div>frm1702RT:txtPg5Sc5I5TotalSpecialAllowable=".request('frm1702RT:txtPg5Sc5I5TotalSpecialAllowable')."frm1702RT:txtPg5Sc5I5TotalSpecialAllowable=</div>	
            <div>frm1702RT:txtPg5Sc6I1GrossIncome=".str_replace(',', '',request('frm1702RT:txtPg5Sc6I1GrossIncome'))."frm1702RT:txtPg5Sc6I1GrossIncome=</div>	
            <div>frm1702RT:txtPg5Sc6I2TotalDeductions=".str_replace(',', '',request('frm1702RT:txtPg5Sc6I2TotalDeductions'))."frm1702RT:txtPg5Sc6I2TotalDeductions=</div>	
            <div>frm1702RT:txtPg5Sc6I3NetOperatingLoss=".str_replace(',', '',request('frm1702RT:txtPg5Sc6I3NetOperatingLoss'))."frm1702RT:txtPg5Sc6I3NetOperatingLoss=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C1=".request('frm1702RT:txtPg5Sc6AI4C1')."frm1702RT:txtPg5Sc6AI4C1=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C2=".str_replace(',', '',request('frm1702RT:txtPg5Sc6AI4C2'))."frm1702RT:txtPg5Sc6AI4C2=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C3=".request('frm1702RT:txtPg5Sc6AI4C3')."frm1702RT:txtPg5Sc6AI4C3=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C1=".request('frm1702RT:txtPg5Sc6AI5C1')."frm1702RT:txtPg5Sc6AI5C1=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C2=".request('frm1702RT:txtPg5Sc6AI5C2')."frm1702RT:txtPg5Sc6AI5C2=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C3=".request('frm1702RT:txtPg5Sc6AI5C3')."frm1702RT:txtPg5Sc6AI5C3=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C1=".request('frm1702RT:txtPg5Sc6AI6C1')."frm1702RT:txtPg5Sc6AI6C1=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C2=".request('frm1702RT:txtPg5Sc6AI6C2')."frm1702RT:txtPg5Sc6AI6C2=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C3=".request('frm1702RT:txtPg5Sc6AI6C3')."frm1702RT:txtPg5Sc6AI6C3=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C1=".request('frm1702RT:txtPg5Sc6AI7C1')."frm1702RT:txtPg5Sc6AI7C1=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C2=".request('frm1702RT:txtPg5Sc6AI7C2')."frm1702RT:txtPg5Sc6AI7C2=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C3=".request('frm1702RT:txtPg5Sc6AI7C3')."frm1702RT:txtPg5Sc6AI7C3=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C4=".request('frm1702RT:txtPg5Sc6AI4C4')."frm1702RT:txtPg5Sc6AI4C4=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C5=".request('frm1702RT:txtPg5Sc6AI4C5')."frm1702RT:txtPg5Sc6AI4C5=</div>	
            <div>frm1702RT:txtPg5Sc6AI4C6=".str_replace(',', '',request('frm1702RT:txtPg5Sc6AI4C6'))."frm1702RT:txtPg5Sc6AI4C6=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C4=".request('frm1702RT:txtPg5Sc6AI5C4')."frm1702RT:txtPg5Sc6AI5C4=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C5=".request('frm1702RT:txtPg5Sc6AI5C5')."frm1702RT:txtPg5Sc6AI5C5=</div>	
            <div>frm1702RT:txtPg5Sc6AI5C6=".request('frm1702RT:txtPg5Sc6AI5C6')."frm1702RT:txtPg5Sc6AI5C6=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C4=".request('frm1702RT:txtPg5Sc6AI6C4')."frm1702RT:txtPg5Sc6AI6C4=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C5=".request('frm1702RT:txtPg5Sc6AI6C5')."frm1702RT:txtPg5Sc6AI6C5=</div>	
            <div>frm1702RT:txtPg5Sc6AI6C6=".request('frm1702RT:txtPg5Sc6AI6C6')."frm1702RT:txtPg5Sc6AI6C6=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C4=".request('frm1702RT:txtPg5Sc6AI7C4')."frm1702RT:txtPg5Sc6AI7C4=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C5=".request('frm1702RT:txtPg5Sc6AI7C5')."frm1702RT:txtPg5Sc6AI7C5=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C6=".request('frm1702RT:txtPg5Sc6AI7C6')."frm1702RT:txtPg5Sc6AI7C6=</div>	
            <div>frm1702RT:txtPg5Sc6AI8TotalNOLCO=".request('frm1702RT:txtPg5Sc6AI8TotalNOLCO')."frm1702RT:txtPg5Sc6AI8TotalNOLCO=</div>	
            <div>frm1702RT:txtPg6TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg6TIN1=</div>	
            <div>frm1702RT:txtPg6TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg6TIN2=</div>	
            <div>frm1702RT:txtPg6TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg6TIN3=</div>	
            <div>frm1702RT:txtPg6BranchCode=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg6BranchCode=</div>	
            <div>txtBranchMaskP6=".request('txtBranchMaskP6')."txtBranchMaskP6=</div>	
            <div>frm1702RT:txtPg6RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg6RegisteredName=</div>	
            <div>frm1702RT:txtPg6Sc7I1ExcessCredits=".request('frm1702RT:txtPg6Sc7I1ExcessCredits')."frm1702RT:txtPg6Sc7I1ExcessCredits=</div>	
            <div>frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT=".request('frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT')."frm1702RT:txtPg6Sc7I2IncomeTaxPaymentUnderMCIT=</div>	
            <div>frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular=".request('frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular')."frm1702RT:txtPg6Sc7I3IncomeTaxUnderRegular=</div>	
            <div>frm1702RT:txtPg6Sc7I4ExcessMCIT=".request('frm1702RT:txtPg6Sc7I4ExcessMCIT')."frm1702RT:txtPg6Sc7I4ExcessMCIT=</div>	
            <div>frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious=".request('frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious')."frm1702RT:txtPg6Sc7I5CreditableTaxWithheldFromPrevious=</div>	
            <div>frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter=".request('frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter')."frm1702RT:txtPg6Sc7I6CreditableTaxWithheldFor4thQuarter=</div>	
            <div>frm1702RT:txtPg6Sc7I7ForeignTaxCredits=".request('frm1702RT:txtPg6Sc7I7ForeignTaxCredits')."frm1702RT:txtPg6Sc7I7ForeignTaxCredits=</div>	
            <div>frm1702RT:txtPg6Sc7I8TaxPaidInReturn=".request('frm1702RT:txtPg6Sc7I8TaxPaidInReturn')."frm1702RT:txtPg6Sc7I8TaxPaidInReturn=</div>	
            <div>frm1702RT:txtPg6Sc7I9SpecialTaxCredits=".request('frm1702RT:txtPg6Sc7I9SpecialTaxCredits')."frm1702RT:txtPg6Sc7I9SpecialTaxCredits=</div>	
            <div>frm1702RT:txtPg6Sc7I10C1=".request('frm1702RT:txtPg6Sc7I10C1')."frm1702RT:txtPg6Sc7I10C1=</div>	
            <div>frm1702RT:txtPg5Sc7I10C2=".request('frm1702RT:txtPg5Sc7I10C2')."frm1702RT:txtPg5Sc7I10C2=</div>	
            <div>frm1702RT:txtPg6Sc7I11C1=".request('frm1702RT:txtPg6Sc7I11C1')."frm1702RT:txtPg6Sc7I11C1=</div>	
            <div>frm1702RT:txtPg6Sc7I11C2=".request('frm1702RT:txtPg6Sc7I11C2')."frm1702RT:txtPg6Sc7I11C2=</div>	
            <div>frm1702RT:txtPg6Sc7I12TotalTaxCredits=".request('frm1702RT:txtPg6Sc7I12TotalTaxCredits')."frm1702RT:txtPg6Sc7I12TotalTaxCredits=</div>	
            <div>frm1702RT:txtPg6Sc8I1C1=".request('frm1702RT:txtPg6Sc8I1C1')."frm1702RT:txtPg6Sc8I1C1=</div>	
            <div>frm1702RT:txtPg6Sc8I1C2=".request('frm1702RT:txtPg6Sc8I1C2')."frm1702RT:txtPg6Sc8I1C2=</div>	
            <div>frm1702RT:txtPg6Sc8I1C3=".request('frm1702RT:txtPg6Sc8I1C3')."frm1702RT:txtPg6Sc8I1C3=</div>	
            <div>frm1702RT:txtPg6Sc8I1C4=".request('frm1702RT:txtPg6Sc8I1C4')."frm1702RT:txtPg6Sc8I1C4=</div>	
            <div>frm1702RT:txtPg6Sc8I2C1=".request('frm1702RT:txtPg6Sc8I2C1')."frm1702RT:txtPg6Sc8I2C1=</div>	
            <div>frm1702RT:txtPg6Sc8I2C2=".request('frm1702RT:txtPg6Sc8I2C2')."frm1702RT:txtPg6Sc8I2C2=</div>	
            <div>frm1702RT:txtPg6Sc8I2C3=".request('frm1702RT:txtPg6Sc8I2C3')."frm1702RT:txtPg6Sc8I2C3=</div>	
            <div>frm1702RT:txtPg6Sc8I2C4=".request('frm1702RT:txtPg6Sc8I2C4')."frm1702RT:txtPg6Sc8I2C4=</div>	
            <div>frm1702RT:txtPg6Sc8I3C1=".request('frm1702RT:txtPg6Sc8I3C1')."frm1702RT:txtPg6Sc8I3C1=</div>	
            <div>frm1702RT:txtPg6Sc8I3C2=".request('frm1702RT:txtPg6Sc8I3C2')."frm1702RT:txtPg6Sc8I3C2=</div>	
            <div>frm1702RT:txtPg6Sc8I3C3=".request('frm1702RT:txtPg6Sc8I3C3')."frm1702RT:txtPg6Sc8I3C3=</div>	
            <div>frm1702RT:txtPg6Sc8I3C4=".request('frm1702RT:txtPg6Sc8I3C4')."frm1702RT:txtPg6Sc8I3C4=</div>	
            <div>frm1702RT:txtPg6Sc8I1C5=".request('frm1702RT:txtPg6Sc8I1C5')."frm1702RT:txtPg6Sc8I1C5=</div>	
            <div>frm1702RT:txtPg6Sc8I1C6=".request('frm1702RT:txtPg6Sc8I1C6')."frm1702RT:txtPg6Sc8I1C6=</div>	
            <div>frm1702RT:txtPg6Sc8I1C7=".request('frm1702RT:txtPg6Sc8I1C7')."frm1702RT:txtPg6Sc8I1C7=</div>	
            <div>frm1702RT:txtPg6Sc8I1C8=".request('frm1702RT:txtPg6Sc8I1C8')."frm1702RT:txtPg6Sc8I1C8=</div>	
            <div>frm1702RT:txtPg6Sc8I2C5=".request('frm1702RT:txtPg6Sc8I2C5')."frm1702RT:txtPg6Sc8I2C5=</div>	
            <div>frm1702RT:txtPg6Sc8I2C6=".request('frm1702RT:txtPg6Sc8I2C6')."frm1702RT:txtPg6Sc8I2C6=</div>	
            <div>frm1702RT:txtPg6Sc8I2C7=".request('frm1702RT:txtPg6Sc8I2C7')."frm1702RT:txtPg6Sc8I2C7=</div>	
            <div>frm1702RT:txtPg6Sc8I2C8=".request('frm1702RT:txtPg6Sc8I2C8')."frm1702RT:txtPg6Sc8I2C8=</div>	
            <div>frm1702RT:txtPg6Sc8I3C5=".request('frm1702RT:txtPg6Sc8I3C5')."frm1702RT:txtPg6Sc8I3C5=</div>	
            <div>frm1702RT:txtPg6Sc8I3C6=".request('frm1702RT:txtPg6Sc8I3C6')."frm1702RT:txtPg6Sc8I3C6=</div>	
            <div>frm1702RT:txtPg6Sc8I3C7=".request('frm1702RT:txtPg6Sc8I3C7')."frm1702RT:txtPg6Sc8I3C7=</div>	
            <div>frm1702RT:txtPg6Sc8I3C8=".request('frm1702RT:txtPg6Sc8I3C8')."frm1702RT:txtPg6Sc8I3C8=</div>	
            <div>frm1702RT:txtPg6Sc8I4TotalExcessMCIT=".request('frm1702RT:txtPg6Sc8I4TotalExcessMCIT')."frm1702RT:txtPg6Sc8I4TotalExcessMCIT=</div>	
            <div>frm1702RT:txtPg6Sc9I1NetIncome=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I1NetIncome'))."frm1702RT:txtPg6Sc9I1NetIncome=</div>	
            <div>frm1702RT:txtPg6Sc9I2C1=".request('frm1702RT:txtPg6Sc9I2C1')."frm1702RT:txtPg6Sc9I2C1=</div>	
            <div>frm1702RT:txtPg6Sc9I2C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I2C2'))."frm1702RT:txtPg6Sc9I2C2=</div>	
            <div>frm1702RT:txtPg6Sc9I3C1=".request('frm1702RT:txtPg6Sc9I3C1')."frm1702RT:txtPg6Sc9I3C1=</div>	
            <div>frm1702RT:txtPg6Sc9I3C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I3C2'))."frm1702RT:txtPg6Sc9I3C2=</div>	
            <div>frm1702RT:txtPg6Sc9I4Total=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I4Total'))."frm1702RT:txtPg6Sc9I4Total=</div>	
            <div>frm1702RT:txtPg6Sc9I5C1=".request('frm1702RT:txtPg6Sc9I5C1')."frm1702RT:txtPg6Sc9I5C1=</div>	
            <div>frm1702RT:txtPg6Sc9I5C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I5C2'))."frm1702RT:txtPg6Sc9I5C2=</div>	
            <div>frm1702RT:txtPg6Sc9I6C1=".request('frm1702RT:txtPg6Sc9I6C1')."frm1702RT:txtPg6Sc9I6C1=</div>	
            <div>frm1702RT:txtPg6Sc9I6C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I6C2'))."frm1702RT:txtPg6Sc9I6C2=</div>	
            <div>frm1702RT:txtPg6Sc9I7C1=".request('frm1702RT:txtPg6Sc9I7C1')."frm1702RT:txtPg6Sc9I7C1=</div>	
            <div>frm1702RT:txtPg6Sc9I7C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I7C2'))."frm1702RT:txtPg6Sc9I7C2=</div>	
            <div>frm1702RT:txtPg6Sc9I8C1=".request('frm1702RT:txtPg6Sc9I8C1')."frm1702RT:txtPg6Sc9I8C1=</div>	
            <div>frm1702RT:txtPg6Sc9I8C2=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I8C2'))."frm1702RT:txtPg6Sc9I8C2=</div>	
            <div>frm1702RT:txtPg6Sc9I9Total=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I9Total'))."frm1702RT:txtPg6Sc9I9Total=</div>	
            <div>frm1702RT:txtPg6Sc9I10NetTaxableIncome=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I10NetTaxableIncome'))."frm1702RT:txtPg6Sc9I10NetTaxableIncome=</div>	
            <div>frm1702RT:txtPg7TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg7TIN1=</div>	
            <div>frm1702RT:txtPg7TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg7TIN2=</div>	
            <div>frm1702RT:txtPg7TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg7TIN3=</div>	
            <div>frm1702RT:txtPg7BranchCode=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg7BranchCode=</div>	
            <div>txtBranchMaskP7=".request('txtBranchMaskP7')."txtBranchMaskP7=</div>	
            <div>frm1702RT:txtPg7RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg7RegisteredName=</div>	
            <div>frm1702RT:txtPg7Sc10I1CurrentAssets=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I1CurrentAssets'))."frm1702RT:txtPg7Sc10I1CurrentAssets=</div>	
            <div>frm1702RT:txtPg7Sc10I2LongTermInvestment=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I2LongTermInvestment'))."frm1702RT:txtPg7Sc10I2LongTermInvestment=</div>	
            <div>frm1702RT:txtPg7Sc10I3PropertyPlantEquipment=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I3PropertyPlantEquipment'))."frm1702RT:txtPg7Sc10I3PropertyPlantEquipment=</div>	
            <div>frm1702RT:txtPg7Sc10I4LongTermReceivables=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I4LongTermReceivables'))."frm1702RT:txtPg7Sc10I4LongTermReceivables=</div>	
            <div>frm1702RT:txtPg7Sc10I5IntangibleAssets=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I5IntangibleAssets'))."frm1702RT:txtPg7Sc10I5IntangibleAssets=</div>	
            <div>frm1702RT:txtPg7Sc10I6OtherAssets=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I6OtherAssets'))."frm1702RT:txtPg7Sc10I6OtherAssets=</div>	
            <div>frm1702RT:txtPg7Sc10I7TotalAssets=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I7TotalAssets'))."frm1702RT:txtPg7Sc10I7TotalAssets=</div>	
            <div>frm1702RT:txtPg7Sc10I8CurrentLiabilities=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I8CurrentLiabilities'))."frm1702RT:txtPg7Sc10I8CurrentLiabilities=</div>	
            <div>frm1702RT:txtPg7Sc10I9LongTermLiabilities=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I9LongTermLiabilities'))."frm1702RT:txtPg7Sc10I9LongTermLiabilities=</div>	
            <div>frm1702RT:txtPg7Sc10I10DeferredCredits=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I10DeferredCredits'))."frm1702RT:txtPg7Sc10I10DeferredCredits=</div>	
            <div>frm1702RT:txtPg7Sc10I11OtherLiabilities=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I11OtherLiabilities'))."frm1702RT:txtPg7Sc10I11OtherLiabilities=</div>	
            <div>frm1702RT:txtPg7Sc10I12TotalLiabilities=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I12TotalLiabilities'))."frm1702RT:txtPg7Sc10I12TotalLiabilities=</div>	
            <div>frm1702RT:txtPg7Sc10I13CapitalStock=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I13CapitalStock'))."frm1702RT:txtPg7Sc10I13CapitalStock=</div>	
            <div>frm1702RT:txtPg7Sc10I14AdditionalCapital=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I14AdditionalCapital'))."frm1702RT:txtPg7Sc10I14AdditionalCapital=</div>	
            <div>frm1702RT:txtPg7Sc10I15RetainedEarnings=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I15RetainedEarnings'))."frm1702RT:txtPg7Sc10I15RetainedEarnings=</div>	
            <div>frm1702RT:txtPg7Sc10I16TotalEquity=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I16TotalEquity'))."frm1702RT:txtPg7Sc10I16TotalEquity=</div>	
            <div>frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity=".str_replace(',', '',request('frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity'))."frm1702RT:txtPg7Sc10I17TotalLiabilitiesEquity=</div>	
            <div>frm1702RT:chkPg7Sc11Stockholders=".$chkPg7Sc11Stockholders."frm1702RT:chkPg7Sc11Stockholders=</div>	
            <div>frm1702RT:chkPg7Sc11Partners=".$chkPg7Sc11Partners."frm1702RT:chkPg7Sc11Partners=</div>	
            <div>frm1702RT:chkPg7Sc11Members=".$chkPg7Sc11Members."frm1702RT:chkPg7Sc11Members=</div>	
            <div>frm1702RT:txtPg7Sc11I1C1=".request('frm1702RT:txtPg7Sc11I1C1')."frm1702RT:txtPg7Sc11I1C1=</div>	
            <div>frm1702RT:txtPg7Sc11I1Tin1=".request('frm1702RT:txtSc11Tin1')."frm1702RT:txtPg7Sc11I1Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I1Tin2=".request('frm1702RT:txtSc11Tin2')."frm1702RT:txtPg7Sc11I1Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I1Tin3=".request('frm1702RT:txtSc11Tin3')."frm1702RT:txtPg7Sc11I1Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I1Tin4=".request('frm1702RT:txtSc11Tin4')."frm1702RT:txtPg7Sc11I1Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I1C3=".request('frm1702RT:txtPg7Sc11I1C3')."frm1702RT:txtPg7Sc11I1C3=</div>	
            <div>frm1702RT:txtPg7Sc11I1C4=".request('frm1702RT:txtPg7Sc11I1C4')."frm1702RT:txtPg7Sc11I1C4=</div>	
            <div>frm1702RT:txtPg7Sc11I2C1=".request('frm1702RT:txtPg7Sc11I2C1')."frm1702RT:txtPg7Sc11I2C1=</div>	
            <div>frm1702RT:txtPg7Sc11I2Tin1=".request('frm1702RT:txtPg7Sc11I2Tin1')."frm1702RT:txtPg7Sc11I2Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I2Tin2=".request('frm1702RT:txtPg7Sc11I2Tin2')."frm1702RT:txtPg7Sc11I2Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I2Tin3=".request('frm1702RT:txtPg7Sc11I2Tin3')."frm1702RT:txtPg7Sc11I2Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I2Tin4=".request('frm1702RT:txtPg7Sc11I2Tin4')."frm1702RT:txtPg7Sc11I2Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I2C3=".request('frm1702RT:txtPg7Sc11I2C3')."frm1702RT:txtPg7Sc11I2C3=</div>	
            <div>frm1702RT:txtPg7Sc11I2C4=".request('frm1702RT:txtPg7Sc11I2C4')."frm1702RT:txtPg7Sc11I2C4=</div>	
            <div>frm1702RT:txtPg7Sc11I3C1=".request('frm1702RT:txtPg7Sc11I3C1')."frm1702RT:txtPg7Sc11I3C1=</div>	
            <div>frm1702RT:txtPg7Sc11I3Tin1=".request('frm1702RT:txtPg7Sc11I3Tin1')."frm1702RT:txtPg7Sc11I3Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I3Tin2=".request('frm1702RT:txtPg7Sc11I3Tin2')."frm1702RT:txtPg7Sc11I3Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I3Tin3=".request('frm1702RT:txtPg7Sc11I3Tin3')."frm1702RT:txtPg7Sc11I3Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I3Tin4=".request('frm1702RT:txtPg7Sc11I3Tin4')."frm1702RT:txtPg7Sc11I3Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I3C3=".request('frm1702RT:txtPg7Sc11I3C3')."frm1702RT:txtPg7Sc11I3C3=</div>	
            <div>frm1702RT:txtPg7Sc11I3C4=".request('frm1702RT:txtPg7Sc11I3C4')."frm1702RT:txtPg7Sc11I3C4=</div>	
            <div>frm1702RT:txtPg7Sc11I4C1=".request('frm1702RT:txtPg7Sc11I4C1')."frm1702RT:txtPg7Sc11I4C1=</div>	
            <div>frm1702RT:txtPg7Sc11I4Tin1=".request('frm1702RT:txtPg7Sc11I4Tin1')."frm1702RT:txtPg7Sc11I4Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I4Tin2=".request('frm1702RT:txtPg7Sc11I4Tin2')."frm1702RT:txtPg7Sc11I4Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I4Tin3=".request('frm1702RT:txtPg7Sc11I4Tin3')."frm1702RT:txtPg7Sc11I4Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I4Tin4=".request('frm1702RT:txtPg7Sc11I4Tin4')."frm1702RT:txtPg7Sc11I4Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I4C3=".request('frm1702RT:txtPg7Sc11I4C3')."frm1702RT:txtPg7Sc11I4C3=</div>	
            <div>frm1702RT:txtPg7Sc11I4C4=".request('frm1702RT:txtPg7Sc11I4C4')."frm1702RT:txtPg7Sc11I4C4=</div>	
            <div>frm1702RT:txtPg7Sc11I5C1=".request('frm1702RT:txtPg7Sc11I5C1')."frm1702RT:txtPg7Sc11I5C1=</div>	
            <div>frm1702RT:txtPg7Sc11I5Tin1=".request('frm1702RT:txtPg7Sc11I5Tin1')."frm1702RT:txtPg7Sc11I5Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I5Tin2=".request('frm1702RT:txtPg7Sc11I5Tin2')."frm1702RT:txtPg7Sc11I5Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I5Tin3=".request('frm1702RT:txtPg7Sc11I5Tin3')."frm1702RT:txtPg7Sc11I5Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I5Tin4=".request('frm1702RT:txtPg7Sc11I5Tin4')."frm1702RT:txtPg7Sc11I5Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I5C3=".request('frm1702RT:txtPg7Sc11I5C3')."frm1702RT:txtPg7Sc11I5C3=</div>	
            <div>frm1702RT:txtPg7Sc11I5C4=".request('frm1702RT:txtPg7Sc11I5C4')."frm1702RT:txtPg7Sc11I5C4=</div>	
            <div>frm1702RT:txtPg7Sc11I6C1=".request('frm1702RT:txtPg7Sc11I6C1')."frm1702RT:txtPg7Sc11I6C1=</div>	
            <div>frm1702RT:txtPg7Sc11I6Tin1=".request('frm1702RT:txtPg7Sc11I6Tin1')."frm1702RT:txtPg7Sc11I6Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I6Tin2=".request('frm1702RT:txtPg7Sc11I6Tin2')."frm1702RT:txtPg7Sc11I6Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I6Tin3=".request('frm1702RT:txtPg7Sc11I6Tin3')."frm1702RT:txtPg7Sc11I6Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I6Tin4=".request('frm1702RT:txtPg7Sc11I6Tin4')."frm1702RT:txtPg7Sc11I6Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I6C3=".request('frm1702RT:txtPg7Sc11I6C3')."frm1702RT:txtPg7Sc11I6C3=</div>	
            <div>frm1702RT:txtPg7Sc11I6C4=".request('frm1702RT:txtPg7Sc11I6C4')."frm1702RT:txtPg7Sc11I6C4=</div>	
            <div>frm1702RT:txtPg7Sc11I7C1=".request('frm1702RT:txtPg7Sc11I7C1')."frm1702RT:txtPg7Sc11I7C1=</div>	
            <div>frm1702RT:txtPg7Sc11I7Tin1=".request('frm1702RT:txtPg7Sc11I7Tin1')."frm1702RT:txtPg7Sc11I7Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I7Tin2=".request('frm1702RT:txtPg7Sc11I7Tin2')."frm1702RT:txtPg7Sc11I7Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I7Tin3=".request('frm1702RT:txtPg7Sc11I7Tin3')."frm1702RT:txtPg7Sc11I7Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I7Tin4=".request('frm1702RT:txtPg7Sc11I7Tin4')."frm1702RT:txtPg7Sc11I7Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I7C3=".request('frm1702RT:txtPg7Sc11I7C3')."frm1702RT:txtPg7Sc11I7C3=</div>	
            <div>frm1702RT:txtPg7Sc11I7C4=".request('frm1702RT:txtPg7Sc11I7C4')."frm1702RT:txtPg7Sc11I7C4=</div>	
            <div>frm1702RT:txtPg7Sc11I8C1=".request('frm1702RT:txtPg7Sc11I8C1')."frm1702RT:txtPg7Sc11I8C1=</div>	
            <div>frm1702RT:txtPg7Sc11I8Tin1=".request('frm1702RT:txtPg7Sc11I8Tin1')."frm1702RT:txtPg7Sc11I8Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I8Tin2=".request('frm1702RT:txtPg7Sc11I8Tin2')."frm1702RT:txtPg7Sc11I8Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I8Tin3=".request('frm1702RT:txtPg7Sc11I8Tin3')."frm1702RT:txtPg7Sc11I8Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I8Tin4=".request('frm1702RT:txtPg7Sc11I8Tin4')."frm1702RT:txtPg7Sc11I8Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I8C3=".request('frm1702RT:txtPg7Sc11I8C3')."frm1702RT:txtPg7Sc11I8C3=</div>	
            <div>frm1702RT:txtPg7Sc11I8C4=".request('frm1702RT:txtPg7Sc11I8C4')."frm1702RT:txtPg7Sc11I8C4=</div>	
            <div>frm1702RT:txtPg7Sc11I9C1=".request('frm1702RT:txtPg7Sc11I9C1')."frm1702RT:txtPg7Sc11I9C1=</div>	
            <div>frm1702RT:txtPg7Sc11I9Tin1=".request('frm1702RT:txtPg7Sc11I9Tin1')."frm1702RT:txtPg7Sc11I9Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I9Tin2=".request('frm1702RT:txtPg7Sc11I9Tin2')."frm1702RT:txtPg7Sc11I9Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I9Tin3=".request('frm1702RT:txtPg7Sc11I9Tin3')."frm1702RT:txtPg7Sc11I9Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I9Tin4=".request('frm1702RT:txtPg7Sc11I9Tin4')."frm1702RT:txtPg7Sc11I9Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I9C3=".request('frm1702RT:txtPg7Sc11I9C3')."frm1702RT:txtPg7Sc11I9C3=</div>	
            <div>frm1702RT:txtPg7Sc11I9C4=".request('frm1702RT:txtPg7Sc11I9C4')."frm1702RT:txtPg7Sc11I9C4=</div>	
            <div>frm1702RT:txtPg7Sc11I10C1=".request('frm1702RT:txtPg7Sc11I10C1')."frm1702RT:txtPg7Sc11I10C1=</div>	
            <div>frm1702RT:txtPg7Sc11I10Tin1=".request('frm1702RT:txtPg7Sc11I10Tin1')."frm1702RT:txtPg7Sc11I10Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I10Tin2=".request('frm1702RT:txtPg7Sc11I10Tin2')."frm1702RT:txtPg7Sc11I10Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I10Tin3=".request('frm1702RT:txtPg7Sc11I10Tin3')."frm1702RT:txtPg7Sc11I10Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I10Tin4=".request('frm1702RT:txtPg7Sc11I10Tin4')."frm1702RT:txtPg7Sc11I10Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I10C3=".request('frm1702RT:txtPg7Sc11I10C3')."frm1702RT:txtPg7Sc11I10C3=</div>	
            <div>frm1702RT:txtPg7Sc11I10C4=".request('frm1702RT:txtPg7Sc11I10C4')."frm1702RT:txtPg7Sc11I10C4=</div>	
            <div>frm1702RT:txtPg7Sc11I11C1=".request('frm1702RT:txtPg7Sc11I11C1')."frm1702RT:txtPg7Sc11I11C1=</div>	
            <div>frm1702RT:txtPg7Sc11I11Tin1=".request('frm1702RT:txtPg7Sc11I11Tin1')."frm1702RT:txtPg7Sc11I11Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I11Tin2=".request('frm1702RT:txtPg7Sc11I11Tin2')."frm1702RT:txtPg7Sc11I11Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I11Tin3=".request('frm1702RT:txtPg7Sc11I11Tin3')."frm1702RT:txtPg7Sc11I11Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I11Tin4=".request('frm1702RT:txtPg7Sc11I11Tin4')."frm1702RT:txtPg7Sc11I11Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I11C3=".request('frm1702RT:txtPg7Sc11I11C3')."frm1702RT:txtPg7Sc11I11C3=</div>	
            <div>frm1702RT:txtPg7Sc11I11C4=".request('frm1702RT:txtPg7Sc11I11C4')."frm1702RT:txtPg7Sc11I11C4=</div>	
            <div>frm1702RT:txtPg7Sc11I12C1=".request('frm1702RT:txtPg7Sc11I12C1')."frm1702RT:txtPg7Sc11I12C1=</div>	
            <div>frm1702RT:txtPg7Sc11I12Tin1=".request('frm1702RT:txtPg7Sc11I12Tin1')."frm1702RT:txtPg7Sc11I12Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I12Tin2=".request('frm1702RT:txtPg7Sc11I12Tin2')."frm1702RT:txtPg7Sc11I12Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I12Tin3=".request('frm1702RT:txtPg7Sc11I12Tin3')."frm1702RT:txtPg7Sc11I12Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I12Tin4=".request('frm1702RT:txtPg7Sc11I12Tin4')."frm1702RT:txtPg7Sc11I12Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I12C3=".request('frm1702RT:txtPg7Sc11I12C3')."frm1702RT:txtPg7Sc11I12C3=</div>	
            <div>frm1702RT:txtPg7Sc11I12C4=".request('frm1702RT:txtPg7Sc11I12C4')."frm1702RT:txtPg7Sc11I12C4=</div>	
            <div>frm1702RT:txtPg7Sc11I13C1=".request('frm1702RT:txtPg7Sc11I13C1')."frm1702RT:txtPg7Sc11I13C1=</div>	
            <div>frm1702RT:txtPg7Sc11I13Tin1=".request('frm1702RT:txtPg7Sc11I13Tin1')."frm1702RT:txtPg7Sc11I13Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I13Tin2=".request('frm1702RT:txtPg7Sc11I13Tin2')."frm1702RT:txtPg7Sc11I13Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I13Tin3=".request('frm1702RT:txtPg7Sc11I13Tin3')."frm1702RT:txtPg7Sc11I13Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I13Tin4=".request('frm1702RT:txtPg7Sc11I13Tin4')."frm1702RT:txtPg7Sc11I13Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I13C3=".request('frm1702RT:txtPg7Sc11I13C3')."frm1702RT:txtPg7Sc11I13C3=</div>	
            <div>frm1702RT:txtPg7Sc11I13C4=".request('frm1702RT:txtPg7Sc11I13C4')."frm1702RT:txtPg7Sc11I13C4=</div>	
            <div>frm1702RT:txtPg7Sc11I14C1=".request('frm1702RT:txtPg7Sc11I14C1')."frm1702RT:txtPg7Sc11I14C1=</div>	
            <div>frm1702RT:txtPg7Sc11I14Tin1=".request('frm1702RT:txtPg7Sc11I14Tin1')."frm1702RT:txtPg7Sc11I14Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I14Tin2=".request('frm1702RT:txtPg7Sc11I14Tin2')."frm1702RT:txtPg7Sc11I14Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I14Tin3=".request('frm1702RT:txtPg7Sc11I14Tin3')."frm1702RT:txtPg7Sc11I14Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I14Tin4=".request('frm1702RT:txtPg7Sc11I14Tin4')."frm1702RT:txtPg7Sc11I14Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I14C3=".request('frm1702RT:txtPg7Sc11I14C3')."frm1702RT:txtPg7Sc11I14C3=</div>	
            <div>frm1702RT:txtPg7Sc11I14C4=".request('frm1702RT:txtPg7Sc11I14C4')."frm1702RT:txtPg7Sc11I14C4=</div>	
            <div>frm1702RT:txtPg7Sc11I15C1=".request('frm1702RT:txtPg7Sc11I15C1')."frm1702RT:txtPg7Sc11I15C1=</div>	
            <div>frm1702RT:txtPg7Sc11I15Tin1=".request('frm1702RT:txtPg7Sc11I15Tin1')."frm1702RT:txtPg7Sc11I15Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I15Tin2=".request('frm1702RT:txtPg7Sc11I15Tin2')."frm1702RT:txtPg7Sc11I15Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I15Tin3=".request('frm1702RT:txtPg7Sc11I15Tin3')."frm1702RT:txtPg7Sc11I15Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I15Tin4=".request('frm1702RT:txtPg7Sc11I15Tin4')."frm1702RT:txtPg7Sc11I15Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I15C3=".request('frm1702RT:txtPg7Sc11I15C3')."frm1702RT:txtPg7Sc11I15C3=</div>	
            <div>frm1702RT:txtPg7Sc11I15C4=".request('frm1702RT:txtPg7Sc11I15C4')."frm1702RT:txtPg7Sc11I15C4=</div>	
            <div>frm1702RT:txtPg7Sc11I16C1=".request('frm1702RT:txtPg7Sc11I16C1')."frm1702RT:txtPg7Sc11I16C1=</div>	
            <div>frm1702RT:txtPg7Sc11I16Tin1=".request('frm1702RT:txtPg7Sc11I16Tin1')."frm1702RT:txtPg7Sc11I16Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I16Tin2=".request('frm1702RT:txtPg7Sc11I16Tin2')."frm1702RT:txtPg7Sc11I16Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I16Tin3=".request('frm1702RT:txtPg7Sc11I16Tin3')."frm1702RT:txtPg7Sc11I16Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I16Tin4=".request('frm1702RT:txtPg7Sc11I16Tin4')."frm1702RT:txtPg7Sc11I16Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I16C3=".request('frm1702RT:txtPg7Sc11I16C3')."frm1702RT:txtPg7Sc11I16C3=</div>	
            <div>frm1702RT:txtPg7Sc11I16C4=".request('frm1702RT:txtPg7Sc11I16C4')."frm1702RT:txtPg7Sc11I16C4=</div>	
            <div>frm1702RT:txtPg7Sc11I17C1=".request('frm1702RT:txtPg7Sc11I17C1')."frm1702RT:txtPg7Sc11I17C1=</div>	
            <div>frm1702RT:txtPg7Sc11I17Tin1=".request('frm1702RT:txtPg7Sc11I17Tin1')."frm1702RT:txtPg7Sc11I17Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I17Tin2=".request('frm1702RT:txtPg7Sc11I17Tin2')."frm1702RT:txtPg7Sc11I17Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I17Tin3=".request('frm1702RT:txtPg7Sc11I17Tin3')."frm1702RT:txtPg7Sc11I17Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I17Tin4=".request('frm1702RT:txtPg7Sc11I17Tin4')."frm1702RT:txtPg7Sc11I17Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I17C3=".request('frm1702RT:txtPg7Sc11I17C3')."frm1702RT:txtPg7Sc11I17C3=</div>	
            <div>frm1702RT:txtPg7Sc11I17C4=".request('frm1702RT:txtPg7Sc11I17C4')."frm1702RT:txtPg7Sc11I17C4=</div>	
            <div>frm1702RT:txtPg7Sc11I18C1=".request('frm1702RT:txtPg7Sc11I18C1')."frm1702RT:txtPg7Sc11I18C1=</div>	
            <div>frm1702RT:txtPg7Sc11I18Tin1=".request('frm1702RT:txtPg7Sc11I18Tin1')."frm1702RT:txtPg7Sc11I18Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I18Tin2=".request('frm1702RT:txtPg7Sc11I18Tin2')."frm1702RT:txtPg7Sc11I18Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I18Tin3=".request('frm1702RT:txtPg7Sc11I18Tin3')."frm1702RT:txtPg7Sc11I18Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I18Tin4=".request('frm1702RT:txtPg7Sc11I18Tin4')."frm1702RT:txtPg7Sc11I18Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I18C3=".request('frm1702RT:txtPg7Sc11I18C3')."frm1702RT:txtPg7Sc11I18C3=</div>	
            <div>frm1702RT:txtPg7Sc11I18C4=".request('frm1702RT:txtPg7Sc11I18C4')."frm1702RT:txtPg7Sc11I18C4=</div>	
            <div>frm1702RT:txtPg7Sc11I19C1=".request('frm1702RT:txtPg7Sc11I19C1')."frm1702RT:txtPg7Sc11I19C1=</div>	
            <div>frm1702RT:txtPg7Sc11I19Tin1=".request('frm1702RT:txtPg7Sc11I19Tin1')."frm1702RT:txtPg7Sc11I19Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I19Tin2=".request('frm1702RT:txtPg7Sc11I19Tin2')."frm1702RT:txtPg7Sc11I19Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I19Tin3=".request('frm1702RT:txtPg7Sc11I19Tin3')."frm1702RT:txtPg7Sc11I19Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I19Tin4=".request('frm1702RT:txtPg7Sc11I19Tin4')."frm1702RT:txtPg7Sc11I19Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I19C3=".request('frm1702RT:txtPg7Sc11I19C3')."frm1702RT:txtPg7Sc11I19C3=</div>	
            <div>frm1702RT:txtPg7Sc11I19C4=".request('frm1702RT:txtPg7Sc11I19C4')."frm1702RT:txtPg7Sc11I19C4=</div>	
            <div>frm1702RT:txtPg7Sc11I20C1=".request('frm1702RT:txtPg7Sc11I20C1')."frm1702RT:txtPg7Sc11I20C1=</div>	
            <div>frm1702RT:txtPg7Sc11I20Tin1=".request('frm1702RT:txtPg7Sc11I20Tin1')."frm1702RT:txtPg7Sc11I20Tin1=</div>	
            <div>frm1702RT:txtPg7Sc11I20Tin2=".request('frm1702RT:txtPg7Sc11I20Tin2')."frm1702RT:txtPg7Sc11I20Tin2=</div>	
            <div>frm1702RT:txtPg7Sc11I20Tin3=".request('frm1702RT:txtPg7Sc11I20Tin3')."frm1702RT:txtPg7Sc11I20Tin3=</div>	
            <div>frm1702RT:txtPg7Sc11I20Tin4=".request('frm1702RT:txtPg7Sc11I20Tin4')."frm1702RT:txtPg7Sc11I20Tin4=</div>	
            <div>frm1702RT:txtPg7Sc11I20C3=".request('frm1702RT:txtPg7Sc11I20C3')."frm1702RT:txtPg7Sc11I20C3=</div>	
            <div>frm1702RT:txtPg7Sc11I20C4=".request('frm1702RT:txtPg7Sc11I20C4')."frm1702RT:txtPg7Sc11I20C4=</div>	
            <div>frm1702RT:txtPg8TIN1=".request('frm1702RT:txtTIN1')."frm1702RT:txtPg8TIN1=</div>	
            <div>frm1702RT:txtPg8TIN2=".request('frm1702RT:txtTIN2')."frm1702RT:txtPg8TIN2=</div>	
            <div>frm1702RT:txtPg8TIN3=".request('frm1702RT:txtTIN3')."frm1702RT:txtPg8TIN3=</div>	
            <div>frm1702RT:txtPg8BranchCode=".request('frm1702RT:txtTIN4')."frm1702RT:txtPg8BranchCode=</div>	
            <div>txtBranchMaskP8=".request('txtBranchMaskP8')."txtBranchMaskP8=</div>	
            <div>frm1702RT:txtPg8RegisteredName=".$getCompany[0]->registered_name."frm1702RT:txtPg8RegisteredName=</div>	
            <div>frm1702RT:txtPg8Sc12I1C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I1C1'))."frm1702RT:txtPg8Sc12I1C1=</div>	
            <div>frm1702RT:txtPg8Sc12I1C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I1C2'))."frm1702RT:txtPg8Sc12I1C2=</div>	
            <div>frm1702RT:txtPg8Sc12I1C3=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I1C3'))."frm1702RT:txtPg8Sc12I1C3=</div>	
            <div>frm1702RT:txtPg8Sc12I2C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I2C1'))."frm1702RT:txtPg8Sc12I2C1=</div>	
            <div>frm1702RT:txtPg8Sc12I2C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I2C2'))."frm1702RT:txtPg8Sc12I2C2=</div>	
            <div>frm1702RT:txtPg8Sc12I2C3=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I2C3'))."frm1702RT:txtPg8Sc12I2C3=</div>	
            <div>frm1702RT:txtPg8Sc12I3C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I3C1'))."frm1702RT:txtPg8Sc12I3C1=</div>	
            <div>frm1702RT:txtPg8Sc12I3C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I3C2'))."frm1702RT:txtPg8Sc12I3C2=</div>	
            <div>frm1702RT:txtPg8Sc12I3C3=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I3C3'))."frm1702RT:txtPg8Sc12I3C3=</div>	
            <div>frm1702RT:txtPg8Sc12I4C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4C1'))."frm1702RT:txtPg8Sc12I4C1=</div>	
            <div>frm1702RT:txtPg8Sc12I4C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4C2'))."frm1702RT:txtPg8Sc12I4C2=</div>	
            <div>frm1702RT:txtPg8Sc12I4C3=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I4C3'))."frm1702RT:txtPg8Sc12I4C3=</div>	
            <div>frm1702RT:txtPg8Sc12I5C1=".request('frm1702RT:txtPg8Sc12I5C1')."frm1702RT:txtPg8Sc12I5C1=</div>	
            <div>frm1702RT:txtPg8Sc12I5C2=".request('frm1702RT:txtPg8Sc12I5C2')."frm1702RT:txtPg8Sc12I5C2=</div>	
            <div>frm1702RT:txtPg8Sc12I6C1=".request('frm1702RT:txtPg8Sc12I6C1')."frm1702RT:txtPg8Sc12I6C1=</div>	
            <div>frm1702RT:txtPg8Sc12I6C2=".request('frm1702RT:txtPg8Sc12I6C2')."frm1702RT:txtPg8Sc12I6C2=</div>	
            <div>frm1702RT:txtPg8Sc12I7C1=".request('frm1702RT:txtPg8Sc12I7C1')."frm1702RT:txtPg8Sc12I7C1=</div>	
            <div>frm1702RT:txtPg8Sc12I7C2=".request('frm1702RT:txtPg8Sc12I7C2')."frm1702RT:txtPg8Sc12I7C2=</div>	
            <div>frm1702RT:txtPg8Sc12I8C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I8C1'))."frm1702RT:txtPg8Sc12I8C1=</div>	
            <div>frm1702RT:txtPg8Sc12I8C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I8C2'))."frm1702RT:txtPg8Sc12I8C2=</div>	
            <div>frm1702RT:txtPg8Sc12I9C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I9C1'))."frm1702RT:txtPg8Sc12I9C1=</div>	
            <div>frm1702RT:txtPg8Sc12I9C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I9C2'))."frm1702RT:txtPg8Sc12I9C2=</div>	
            <div>frm1702RT:ddlPg8Sc12I10C1=".request('frm1702RT:ddlPg8Sc12I10C1')."frm1702RT:ddlPg8Sc12I10C1=</div>	
            <div>frm1702RT:txtPg8Sc12I10C1=".request('frm1702RT:txtPg8Sc12I10C1')."frm1702RT:txtPg8Sc12I10C1=</div>	
            <div>frm1702RT:ddlPg8Sc12I10C2=".request('frm1702RT:ddlPg8Sc12I10C2')."frm1702RT:ddlPg8Sc12I10C2=</div>	
            <div>frm1702RT:txtPg8Sc12I10C2=".request('frm1702RT:txtPg8Sc12I10C2')."frm1702RT:txtPg8Sc12I10C2=</div>	
            <div>frm1702RT:txtPg8Sc12I11C1=".request('frm1702RT:txtPg8Sc12I11C1')."frm1702RT:txtPg8Sc12I11C1=</div>	
            <div>frm1702RT:txtPg8Sc12I11C2=".request('frm1702RT:txtPg8Sc12I11C2')."frm1702RT:txtPg8Sc12I11C2=</div>	
            <div>frm1702RT:txtPg8Sc12I12C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I12C1'))."frm1702RT:txtPg8Sc12I12C1=</div>	
            <div>frm1702RT:txtPg8Sc12I12C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I12C2'))."frm1702RT:txtPg8Sc12I12C2=</div>	
            <div>frm1702RT:txtPg8Sc12I13C1Date=".request('frm1702RT:txtPg8Sc12I13C1Date')."frm1702RT:txtPg8Sc12I13C1Date=</div>	
            <div>frm1702RT:txtPg8Sc12I13C2Date=".request('frm1702RT:txtPg8Sc12I13C2Date')."frm1702RT:txtPg8Sc12I13C2Date=</div>	
            <div>frm1702RT:txtPg8Sc12I14C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I14C1'))."frm1702RT:txtPg8Sc12I14C1=</div>	
            <div>frm1702RT:txtPg8Sc12I14C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I14C2'))."frm1702RT:txtPg8Sc12I14C2=</div>	
            <div>frm1702RT:txtPg8Sc12I15C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I15C1'))."frm1702RT:txtPg8Sc12I15C1=</div>	
            <div>frm1702RT:txtPg8Sc12I15C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I15C2'))."frm1702RT:txtPg8Sc12I15C2=</div>	
            <div>frm1702RT:txtPg8Sc12I16C1=".request('frm1702RT:txtPg8Sc12I16C1')."frm1702RT:txtPg8Sc12I16C1=</div>	
            <div>frm1702RT:txtPg8Sc12I16C2=".request('frm1702RT:txtPg8Sc12I16C2')."frm1702RT:txtPg8Sc12I16C2=</div>	
            <div>frm1702RT:txtPg8Sc12I17C1=".request('frm1702RT:txtPg8Sc12I17C1')."frm1702RT:txtPg8Sc12I17C1=</div>	
            <div>frm1702RT:txtPg8Sc12I17C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I17C2'))."frm1702RT:txtPg8Sc12I17C2=</div>	
            <div>frm1702RT:txtPg8Sc12I18C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I18C1'))."frm1702RT:txtPg8Sc12I18C1=</div>	
            <div>frm1702RT:txtPg8Sc12I18C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc12I18C2'))."frm1702RT:txtPg8Sc12I18C2=</div>	
            <div>frm1702RT:txtSc12I19TotalFinalTaxWitheld=".str_replace(',', '',request('frm1702RT:txtSc12I19TotalFinalTaxWitheld'))."frm1702RT:txtSc12I19TotalFinalTaxWitheld=</div>	
            <div>frm1702RT:txtPg8Sc13I1ReturnOfPremium=".request('frm1702RT:txtPg8Sc13I1ReturnOfPremium')."frm1702RT:txtPg8Sc13I1ReturnOfPremium=</div>	
            <div>frm1702RT:txtPg8Sc13I2C1=".request('frm1702RT:txtPg8Sc13I2C1')."frm1702RT:txtPg8Sc13I2C1=</div>	
            <div>frm1702RT:txtPg8Sc13I2C2=".request('frm1702RT:txtPg8Sc13I2C2')."frm1702RT:txtPg8Sc13I2C2=</div>	
            <div>frm1702RT:txtPg8Sc13I3C1=".request('frm1702RT:txtPg8Sc13I3C1')."frm1702RT:txtPg8Sc13I3C1=</div>	
            <div>frm1702RT:txtPg8Sc13I3C2=".request('frm1702RT:txtPg8Sc13I3C2')."frm1702RT:txtPg8Sc13I3C2=</div>	
            <div>frm1702RT:txtPg8Sc13I4C1=".request('frm1702RT:txtPg8Sc13I4C1')."frm1702RT:txtPg8Sc13I4C1=</div>	
            <div>frm1702RT:txtPg8Sc13I4C2=".request('frm1702RT:txtPg8Sc13I4C2')."frm1702RT:txtPg8Sc13I4C2=</div>	
            <div>frm1702RT:txtPg8Sc13I5C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I5C1'))."frm1702RT:txtPg8Sc13I5C1=</div>	
            <div>frm1702RT:txtPg8Sc13I5C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I5C2'))."frm1702RT:txtPg8Sc13I5C2=</div>	
            <div>frm1702RT:txtPg8Sc13I6C1=".request('frm1702RT:txtPg8Sc13I6C1')."frm1702RT:txtPg8Sc13I6C1=</div>	
            <div>frm1702RT:txtPg8Sc13I6C2=".request('frm1702RT:txtPg8Sc13I6C2')."frm1702RT:txtPg8Sc13I6C2=</div>	
            <div>frm1702RT:txtPg8Sc13I7C1=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I7C1'))."frm1702RT:txtPg8Sc13I7C1=</div>	
            <div>frm1702RT:txtPg8Sc13I7C2=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I7C2'))."frm1702RT:txtPg8Sc13I7C2=</div>	
            <div>frm1702RT:txtPg8Sc13I8TotalIncome=".str_replace(',', '',request('frm1702RT:txtPg8Sc13I8TotalIncome'))."frm1702RT:txtPg8Sc13I8TotalIncome=</div>	
            <div>frm1702RT:txtPg4Sc3I3CtrModal=".request('frm1702RT:txtPg4Sc3I3CtrModal')."frm1702RT:txtPg4Sc3I3CtrModal=</div>	
            <div>frm1702RT:txtPg4Sc4I4CtrModal=".request('frm1702RT:txtPg4Sc4I4CtrModal')."frm1702RT:txtPg4Sc4I4CtrModal=</div>	
            <div>frm1702RT:txtPg5Sc4I39CtrModal=".request('frm1702RT:txtPg5Sc4I39CtrModal')."frm1702RT:txtPg5Sc4I39CtrModal=</div>	
            <div>frm1702RT:txtPg5Sc5I4CtrModal=".request('frm1702RT:txtPg5Sc5I4CtrModal')."frm1702RT:txtPg5Sc5I4CtrModal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7CtrModal=".request('frm1702RT:txtPg5Sc6AI7CtrModal')."frm1702RT:txtPg5Sc6AI7CtrModal=</div>	
            <div>frm1702RT:txtPg6Sc7I11CtrModal=".request('frm1702RT:txtPg6Sc7I11CtrModal')."frm1702RT:txtPg6Sc7I11CtrModal=</div>	
            <div>frm1702RT:txtPg6Sc9I3CtrModal=".request('frm1702RT:txtPg6Sc9I3CtrModal')."frm1702RT:txtPg6Sc9I3CtrModal=</div>	
            <div>frm1702RT:txtPg6Sc9I6CtrModal=".request('frm1702RT:txtPg6Sc9I6CtrModal')."frm1702RT:txtPg6Sc9I6CtrModal=</div>	
            <div>frm1702RT:txtPg6Sc9I8CtrModal=".request('frm1702RT:txtPg6Sc9I8CtrModal')."frm1702RT:txtPg6Sc9I8CtrModal=</div>	
            <div>frm1702RT:txtPg8Sc12I4CtrModal=".request('frm1702RT:txtPg8Sc12I4CtrModal')."frm1702RT:txtPg8Sc12I4CtrModal=</div>	
            <div>frm1702RT:txtCtrmodalPg8Sc12II=".request('frm1702RT:txtCtrmodalPg8Sc12II')."frm1702RT:txtCtrmodalPg8Sc12II=</div>	
            <div>frm1702RT:txtCtrmodalPg8Sc12III=".request('frm1702RT:txtCtrmodalPg8Sc12III')."frm1702RT:txtCtrmodalPg8Sc12III=</div>	
            <div>frm1702RT:txtCtrmodalPg8Sc12IV=".request('frm1702RT:txtCtrmodalPg8Sc12IV')."frm1702RT:txtCtrmodalPg8Sc12IV=</div>	
            <div>frm1702RT:txtCtrmodalPg8Sc13I=".request('frm1702RT:txtCtrmodalPg8Sc13I')."frm1702RT:txtCtrmodalPg8Sc13I=</div>	
            <div>frm1702RT:txtCtrmodalPg8Sc13II=".request('frm1702RT:txtCtrmodalPg8Sc13II')."frm1702RT:txtCtrmodalPg8Sc13II=</div>	
            <div>frm1702RT:txtCurrentPage=".request('frm1702RT:txtCurrentPage')."frm1702RT:txtCurrentPage=</div>	
            <div>frm1702RT:txtMaxPage=".request('frm1702RT:txtMaxPage')."frm1702RT:txtMaxPage=</div>	".$xml_sched3."
            <div>frm1702RT:txtPg4Sc3I3Subtotal=".request('frm1702RT:txtPg4Sc3I3Subtotal')."frm1702RT:txtPg4Sc3I3Subtotal=</div>	".$xml_sched4."
            <div>frm1702RT:txtPg4Sc4I4Subtotal=".request('frm1702RT:txtPg4Sc4I4Subtotal')."frm1702RT:txtPg4Sc4I4Subtotal=</div>	".$xml_sched4_others."
            <div>frm1702RT:txtPg5Sc4I39Subtotal=".str_replace(',', '', request('frm1702RT:txtPg5Sc4I39Subtotal'))."frm1702RT:txtPg5Sc4I39Subtotal=</div>	".$xml_sched5."
            <div>frm1702RT:txtPg5Sc5I4Subtotal=".request('frm1702RT:txtPg5Sc5I4Subtotal')."frm1702RT:txtPg5Sc5I4Subtotal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C2Subtotal=".request('frm1702RT:txtPg5Sc6AI7C2Subtotal')."frm1702RT:txtPg5Sc6AI7C2Subtotal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C3Subtotal=".request('frm1702RT:txtPg5Sc6AI7C3Subtotal')."frm1702RT:txtPg5Sc6AI7C3Subtotal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C4Subtotal=".request('frm1702RT:txtPg5Sc6AI7C4Subtotal')."frm1702RT:txtPg5Sc6AI7C4Subtotal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C5Subtotal=".request('frm1702RT:txtPg5Sc6AI7C5Subtotal')."frm1702RT:txtPg5Sc6AI7C5Subtotal=</div>	
            <div>frm1702RT:txtPg5Sc6AI7C6Subtotal=".request('frm1702RT:txtPg5Sc6AI7C6Subtotal')."frm1702RT:txtPg5Sc6AI7C6Subtotal=</div>	".$xml_sched7."
            <div>frm1702RT:txtPg6Sc7I11Subtotal=".request('frm1702RT:txtPg6Sc7I11SubTotal')."frm1702RT:txtPg6Sc7I11Subtotal=</div>	".$xml_sched9_3."
            <div>frm1702RT:txtPg6Sc9I3Subtotal=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I3Subtotal'))."frm1702RT:txtPg6Sc9I3Subtotal=</div>	".$xml_sched9_6."
            <div>frm1702RT:txtPg6Sc9I6Subtotal=".request('frm1702RT:txtPg6Sc9I6Subtotal')."frm1702RT:txtPg6Sc9I6Subtotal=</div>	".$xml_sched9_8."
            <div>frm1702RT:txtPg6Sc9I8Subtotal=".str_replace(',', '', request('frm1702RT:txtPg6Sc9I8Subtotal'))."frm1702RT:txtPg6Sc9I8Subtotal=</div>	".$xml_sched12_1."
            <div>frm1702RT:txtPg8Sc12I4Subtotal=".str_replace(',', '', request('frm1702RT:txtPg8Sc12I4SubTotal'))."frm1702RT:txtPg8Sc12I4Subtotal=</div>	".$xml_sched12_2."
            ".$xml_sched12_3.$xml_sched12_4.$xml_sched13_1.$xml_sched13_2."<div>driveSelectTPExport=0driveSelectTPExport=</div>	
            <div>txtFinalFlag=0txtFinalFlag=</div>	
            <div>txtEnroll=NtxtEnroll=</div>	
            <div>ebirOnlineConfirmUsername=ebirOnlineConfirmUsername=</div>	
            <div>ebirOnlineUsername=ebirOnlineUsername=</div>	
            <div>ebirOnlineSecret=ebirOnlineSecret=</div>	
            	
            All Rights Reserved BIR 2014.";

            $tin = request('frm1702RT:txtTIN1').request('frm1702RT:txtTIN2').request('frm1702RT:txtTIN3').request('frm1702RT:txtTIN4');

            $return_period = request('frm1702RT:ddlPg1I2Month').request('frm1702RT:txtPg1I2Year');

            $getReturnPeriod = tbl_1702RT_1::where('company_id',  request('company'))
     						->where('item2A', request('frm1702RT:ddlPg1I2Month'))
     						->where('item2B', request('frm1702RT:txtPg1I2Year'))
     						->count();

     		$filename = "";
     		if($getReturnPeriod == "1"){
     			$filename = $tin."-1702RT-".request('frm1702RT:ddlPg1I2Month').request('frm1702RT:txtPg1I2Year').'.xml';
     		}else{
     			if(request('form_id') != ""){
                    $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $form->id)
                            ->where('form', '1702RT')
                            ->get();
                    if($getXml[0]->return_period == $return_period ){
                        if(substr($getXml[0]->file_name, -6, 1) != 'V'){
                            $ext = "";
                        }else{
                            $ext = 'V'.substr($getXml[0]->file_name, -5, 1);
                        }
                    }else{
                        $ext = 'V'.($getReturnPeriod - 1);
                    }
                }else{
                       $ext = 'V'.($getReturnPeriod - 1);
                }
     			$filename = $tin."-1702RT-".request('frm1702RT:ddlPg1I2Month').request('frm1702RT:txtPg1I2Year').$ext.'.xml';
     		}

     		$action = "";
            if(request('form_id') != ""){
                $action ="update";
            }else{
                if($getForm->isEmpty()){
                    $action = "insert";
                }else{
                    $action = "update";
                }
            }

            if($action == "insert"){
	     		$myXMLFile = fopen("savefile/".$filename, "w");
	     		fwrite($myXMLFile, $xmlData);
	            fclose($myXMLFile);

	            $data_xml = ([
		     		'user_id'		=> Auth::user()->id,
		     		'company_id'	=> request('company'),
		     		'form_id'		=> $form->id,
		     		'form'			=> '1702RT',
		     		'file_name'		=> $filename,
		     		'return_period'	=> $return_period,
		     		'status'		=> 'Saved',
		     	]);

	     		$xml_id = Xml::create($data_xml);

	     	}else{
	     		$getXml = Xml::where('user_id', Auth::user()->id)
     						->where('company_id', request('company'))
     						->where('form_id', $form->id)
     						->where('form', '1702RT')
     						->get();

     			$path = "savefile/".$getXml[0]->file_name;
     			if (file_exists($path)) {
                    unlink($path);
                }

                $myXMLFile = fopen("savefile/".$filename, "w");
	     		fwrite($myXMLFile, $xmlData);
	            fclose($myXMLFile);

	            $data_xml = ([
		     		'user_id'		=> Auth::user()->id,
		     		'company_id'	=> request('company'),
		     		'form_id'		=> $form->id,
		     		'form'			=> '1702RT',
		     		'file_name'		=> $getXml[0]->file_name,
		     		'return_period'	=> $return_period,
		     		'status'		=> 'Saved',
		     	]);
		     	
	     		$xml = Xml::find($getXml[0]->id);
     			$xml->update($data_xml);
	     	}

            echo $form->id.$filename;

    }

    public function update()
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
       
        $data = ([
            'status'        => 'Filed',
        ]);

        if(request('form_id') != ""){
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', request('form_id'))
                            ->where('form', '1702RT')
                            ->get();

            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }else{
            $getData = tbl_1702RT_1::where('company_id', request('company'))
                                    ->where('form_no', request('form_no'))
                                    ->get();
            
            $getXml = Xml::where('user_id', Auth::user()->id)
                            ->where('company_id', request('company'))
                            ->where('form_id', $getData[0]->id)
                            ->where('form', '1702RT')
                            ->get();
            $xml = Xml::find($getXml[0]->id);
            $xml->update($data);

            echo $xml->form_id;
        }
    }
    public function show($company, $action, $form_id)
    {
        config(['database.connections.mysql2.database' => Auth::user()->database_name]);
        
        $company = Companies::find($company);

        $data = tbl_1702RT_1::find($form_id);
        $xml = Xml::where('user_id', Auth::user()->id)
     						->where('company_id', $company->id)
     						->where('form_id', $form_id)
     						->where('form', '1702RT')
     						->get();
        return view('forms.BIR-Form 1702RT',['company' => $company, 'data' => $data, 'xml' => $xml , 'action' => $action]);
    }
}
