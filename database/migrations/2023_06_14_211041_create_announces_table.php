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
        Schema::create('announces', function (Blueprint $table) {
            $table->id('announce_id');
            $table->string('titre', 20);
            $table->text('description');
            $table->enum('type', ['Appartement', 'Maison', 'Villa', 'Magasin', 
            'Terrain']);
            $table->string('ville', 20);
            $table->unsignedBigInteger('superficie');
            $table->boolean('neuf');
            $table->decimal('prix', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announces');
    }
};
