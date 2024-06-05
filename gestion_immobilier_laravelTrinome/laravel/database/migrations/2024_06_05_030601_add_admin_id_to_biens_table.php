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
        Schema::table('biens', function (Blueprint $table) {
            // Ajouter la colonne admin_id après la colonne id
            $table->unsignedBigInteger('admin_id')->after('statut');
            // Définir la clé étrangère pour admin_id
            $table->foreign('admin_id')->references('id')->on('administrateurs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biens', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne admin_id rollback
            $table->dropForeign(['admin_id']);
            $table->dropColumn('admin_id');
        });
    }
};

