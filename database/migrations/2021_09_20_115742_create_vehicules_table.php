<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('price');
            $table->bigInteger('model_id')->constrained();
            $table->bigInteger('user_id')->constrained();
            $table->bigInteger('sold');
            $table->year('made_year')->nullable();
            $table->string('plate_number', 17)->nullable();
            $table->text('description');
            $table->enum('precision', ['With driver', 'Without driver'])->nullable();
            $table->enum('status', ['For sell', 'For rent']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicules');
    }
}
