<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('iam')->create('user', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_type');
            $table->string('phone');
            $table->string('name');
            $table->string('username');
            $table->integer('created_at');
            $table->boolean('soft_deleted')->default(true);
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('iam')->dropIfExists('user');
    }
};
