<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDatePublicationFromCommentairesTable extends Migration
{
    public function up()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->dropColumn('date_publication');
        });
    }

    public function down()
    {
        Schema::table('commentaires', function (Blueprint $table) {
            $table->timestamp('date_publication')->nullable();
        });
    }
}
