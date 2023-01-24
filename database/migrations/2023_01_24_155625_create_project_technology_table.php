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
        Schema::create('project_technology', function (Blueprint $table) {
            // $table->id();
            // $table->timestamps();

            // relazione con i projects
            // 1. creo la colonna FK per i project
            $table->unsignedBigInteger('project_id');
            // 2. creo la la FK per questa colonna
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->cascadeOnDelete(); //mi permette di eliminare ogni relazione all'eliminazione del project


            // relazione con i technologies
            // 1. creo la colonna FK per i project
            $table->unsignedBigInteger('technology_id');
            // 2. creo la la FK per questa colonna
            $table->foreign('technology_id')
                ->references('id')
                ->on('technologies')
                ->cascadeOnDelete(); //mi permette di eliminare ogni relazione all'eliminazione della technology

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_technology');
    }
};
