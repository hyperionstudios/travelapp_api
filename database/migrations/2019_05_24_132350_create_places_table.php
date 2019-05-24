<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string( 'title' );
            $table->text( 'description' );
            $table->double( 'cost' );
            $table->double( 'discount' )->default(0);
            $table->integer( 'rating' )->nullable();
            $table->integer( 'user_id' );
            $table->string( 'type' );
            $table->integer( 'destination_id' );
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
        Schema::dropIfExists('places');
    }
}
