<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            // $table->integerIncrements('id_entrada');
            $table->unsignedBigInteger('session_id');
            $table->foreign('session_id')->references('id_session')->on('sessions')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->string('seat');
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            
            // Define la clave primaria compuesta
            $table->primary(['session_id', 'seat']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
