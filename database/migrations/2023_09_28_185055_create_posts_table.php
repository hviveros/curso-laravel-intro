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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Campos personalizados
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('body');

            // Nuevo campo, que tendrá relación con otra tabla
            // unsigned -> sólo acepta números positivos
            // en otra línea, indicamos que el campo es una clave foránea
            // y a qué tabla hace referencia
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
