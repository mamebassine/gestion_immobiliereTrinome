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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom',100);
            $table->enum('categorie',['luxe', 'moyenne', 'economie']);
            $table->string('image');
            $table->text('description');
            $table->string('adresse',255);
            $table->enum('statut', ['occupe', 'libre']);
            $table->timestamp('date_ajout');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
