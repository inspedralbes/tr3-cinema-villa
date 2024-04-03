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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('id_session');
            $table->date('day');
            $table->time('hour');
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id')->references('id_movie')->on('movies')->onDelete('cascade');
            $table->boolean('audienceDay')->default(false);
            $table->decimal('priceBase', 10, 2)->default(6.00);
            $table->integer('total_tickets')->default(120);
            $table->integer('tickets_sold')->default(0);
        });

        DB::table('sessions')->insert([
            'day' => '2024-04-15', 
            'hour' => '18:00:00', 
            'movie_id' => '1',
            'audienceDay' => true,
            'priceBase' => 4.00,
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-16', 
            'hour' => '16:00:00', 
            'movie_id' => '6',
            'priceBase' => 8.00,
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-17', 
            'hour' => '20:00:00', 
            'movie_id' => '8', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-18', 
            'hour' => '18:00:00', 
            'movie_id' => '3', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-19', 
            'hour' => '18:00:00', 
            'movie_id' => '12', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-20', 
            'hour' => '20:00:00', 
            'movie_id' => '17', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-21', 
            'hour' => '16:00:00', 
            'movie_id' => '14', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-22', 
            'hour' => '16:00:00', 
            'movie_id' => '5', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);

        DB::table('sessions')->insert([
            'day' => '2024-04-23', 
            'hour' => '20:00:00', 
            'movie_id' => '16', 
            'total_tickets' => 120, 
            'tickets_sold' => 0, 
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
