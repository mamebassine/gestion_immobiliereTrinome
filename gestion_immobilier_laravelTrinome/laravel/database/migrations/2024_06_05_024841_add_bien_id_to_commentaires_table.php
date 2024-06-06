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
        Schema::table('commentaires', function (Blueprint $table) {
            // Ajouter la colonne bien_id après la colonne auteur
            $table->unsignedBigInteger('bien_id')->after('auteur');
            // Définir la clé étrangère pour bien_id
            $table->foreign('bien_id')->references('id')->on('biens')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commentaires', function (Blueprint $table) {
            // Supprimer la clé étrangère et la colonne bien_id quand on fait un rollback 
            $table->dropForeign(['bien_id']);
            $table->dropColumn('bien_id');
        });
    }
};
