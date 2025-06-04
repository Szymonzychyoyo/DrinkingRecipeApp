<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('book_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('full_name');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->string('status')->default('Oczekujące');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_orders');
    }

};
