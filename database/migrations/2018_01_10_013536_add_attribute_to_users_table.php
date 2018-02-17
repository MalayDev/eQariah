<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('ad_id');
            $table->string('ic');
            $table->string('age');
            $table->string('phone_home');
            $table->string('phone_mobile');
            $table->string('marital_status');
            $table->string('residence_period');
            $table->string('address');
            $table->string('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('image');
            $table->dateTime('verify_date_nazir');
            $table->string('remarks_nazir');
            $table->dateTime('verify_date_headv');
            $table->string('remarks_headv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('ad_id');
            $table->dropColumn('ic');
            $table->dropColumn('age');
            $table->dropColumn('phone_home');
            $table->dropColumn('phone_mobile');
            $table->dropColumn('marital_status');
            $table->dropColumn('residence_period');
            $table->dropColumn('address');
            $table->dropColumn('postcode');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('image');
            $table->dropColumn('verify_date_nazir');
            $table->dropColumn('remarks_nazir');
            $table->dropColumn('verify_date_headv');
            $table->dropColumn('remarks_headv');
        });
    }
}
