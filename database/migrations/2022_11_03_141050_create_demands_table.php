<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
 
            $table->foreign('client_id')->references('id')->on('clients');

            $table->unsignedBigInteger('voiture_id');
 
            $table->foreign('voiture_id')->references('id')->on('voitures');

            $table->date('debut_dmd');

            $table->date('fin_dmd');

            $table->string('prixT');

           
            $table->string('prixT');
            
            $table->softDeletes($column = 'deleted_at', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('demands');
    }
};
