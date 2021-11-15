<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTelegramUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_users', function (Blueprint $table) {
            $table->id();
            $table->string('t_firstname')->comment('Telegram first name');
            $table->string('t_lastname')->comment('Telegram last name');
            $table->string('t_id')->comment('Telegram user id');
            $table->string('u_name')->nullable()->comment('User first name. Only russian letters allowed');
            $table->tinyInteger('u_age')->nullable()->comment('User age');
            $table->string('status')->default('Новый');
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
        Schema::dropIfExists('telegram_users');
    }
}
