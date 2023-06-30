<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_Id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('City')->nullable();
            $table->string('Locatontype')->nullable();
            $table->string('address')->nullable();
            $table->string('Trakcode')->nullable();
            $table->string('quntity')->nullable();
            $table->string('pmode')->nullable();
            $table->string('delveryId')->nullable();
            $table->string('status')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
