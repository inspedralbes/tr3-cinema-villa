<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->string('seat');
            $table->decimal('price', 10, 2);
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            
            // Define la clave primaria compuesta
            $table->primary(['session_id', 'seat']);
        });

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'A-1',
            'price' => 4.00, 
            'email' => 'client1@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'One',
            'phone_number' => '123456789',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'A-2',
            'price' => 4.00,
            'email' => 'client1@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'One',
            'phone_number' => '123456789',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'A-3',
            'price' => 4.00,
            'email' => 'client1@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'One',
            'phone_number' => '123456789',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'A-4',
            'price' => 4.00,
            'email' => 'client1@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'One',
            'phone_number' => '123456789',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'F-1-VIP',
            'price' => 6.00,
            'email' => 'client2@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Two',
            'phone_number' => '234567890',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '1',
            'seat' => 'F-2-VIP',
            'price' => 6.00,
            'email' => 'client2@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Two',
            'phone_number' => '234567890',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '5',
            'seat' => 'F-6-VIP',
            'price' => 8.00,
            'email' => 'client3@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Three',
            'phone_number' => '345678901',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '5',
            'seat' => 'F-7-VIP',
            'price' => 8.00,
            'email' => 'client3@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Three',
            'phone_number' => '345678901',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '5',
            'seat' => 'F-8-VIP',
            'price' => 8.00,
            'email' => 'client3@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Three',
            'phone_number' => '345678901',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '5',
            'seat' => 'F-9-VIP',
            'price' => 8.00,
            'email' => 'client3@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Three',
            'phone_number' => '345678901',
        ]);

        DB::table('entradas')->insert([
            'session_id' => '5',
            'seat' => 'F-10-VIP',
            'price' => 8.00,
            'email' => 'client3@gmail.com',
            'first_name' => 'Client',
            'last_name' => 'Three',
            'phone_number' => '345678901',
        ]);
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
