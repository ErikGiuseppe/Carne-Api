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
        Schema::create('carnes', function (Blueprint $table) {
            $table->id();
            $table->float("valor_total");
            $table->integer("qtd_parcelas");
            $table->date("data_primeiro_vencimento");
            $table->string("periodicidade");
            $table->float("valor_entrada")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carnes');
    }
};
