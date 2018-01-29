<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAttToNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('ic')->nullable()->change();
            $table->string('age')->nullable()->change();
            $table->string('phone_home')->nullable()->change();
            $table->string('phone_mobile')->nullable()->change();
            $table->string('marital_status')->nullable()->change();
            $table->string('residence_period')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('postcode')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('image')->nullable()->change();
            $table->dateTime('verify_date_nazir')->nullable()->change();
            $table->string('remarks_nazir')->nullable()->change();
            $table->dateTime('verify_date_headv')->nullable()->change();
            $table->string('remarks_headv')->nullable()->change();

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
            
            $table->string('ic')->nullable(false)->change();
            $table->string('age')->nullable(false)->change();
            $table->string('phone_home')->nullable(false)->change();
            $table->string('phone_mobile')->nullable(false)->change();
            $table->string('marital_status')->nullable(false)->change();
            $table->string('residence_period')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('postcode')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('state')->nullablefalsechange();
            $table->dateTime('verify_date_nazir')->nullable(false)->change();
            $table->string('remarks_nazir')->nullable(false)->change();
            $table->dateTime('verify_date_headv')->nullable(false)->change();
            $table->string('remarks_headv')->nullable(false)->change();
        });
    }
}
