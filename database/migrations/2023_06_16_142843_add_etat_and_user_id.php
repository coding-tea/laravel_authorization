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
        Schema::table('announces', function (Blueprint $table) {
            $table->enum('etat', ['en cours', 'validé', 'signalé']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('announces', function (Blueprint $table) {
            $table->dropColumn('etat');
        });
    }
};
