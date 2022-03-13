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
        Schema::create('gas_stations', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->string('street')->nullable(false);
            $table->string('city')->nullable(false);
            $table->double('priceDiesel')->default(0.0);
            $table->double('priceDieselSpecial')->default(0.0);
            $table->double('pricePetrol')->default(0.0);
            $table->double('pricePetrolSpecial')->default(0.0);
            $table->double('priceLPG')->default(0.0);
            $table->double('priceCNG')->default(0.0);
            $table->timestamps();
        });

        Schema::table('gas_stations', function (Blueprint $table){
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gas_stations');
    }
};
