<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->longText('about')->nullable();
          $table->string('name')->nullable();
          $table->integer('priv_about')->default(0);
          $table->integer('priv_id')->default(0);
          $table->integer('priv_name')->default(0);
          $table->integer('priv_email')->default(0);
          $table->integer('priv_user_image')->default(0);
          $table->integer('priv_gender')->default(0);
          $table->integer('priv_birth')->default(0);
          $table->integer('priv_city')->default(0);
          $table->integer('priv_province_state')->default(0);
          $table->integer('priv_country')->default(0);
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
            //
        });
    }
}
