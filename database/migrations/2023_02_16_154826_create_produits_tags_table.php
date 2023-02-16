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
        Schema::create('produits_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tag_id')->unsigned()->nullable();
            $table->foreign('tag_id')
                    ->references('id')
                    ->on('tags');
            $table->bigInteger('produit_id')->unsigned()->nullable();
            $table->foreign('produit_id')
                    ->references('id')
                    ->on('produits');
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
        Schema::dropIfExists('categories_tags');
    }
};
