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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('profissional', )->nullable(false);
            $table->string('cliente', )->nullable(true);
            $table->string('servico', )->nullable(true);
            $table->dateTime('data_hora',  )->nullable(false);
            $table->string('pagamento',20)->nullable(false);
            $table->string('valor',)->nullable(false);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
