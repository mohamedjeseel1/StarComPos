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
        Schema::create('view_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name', 10);
            $table->string('branch', 10);
            $table->string('supplier', 10)->nullable();
            $table->integer('quantity');
            $table->string('unit', 10);
            $table->float('price', 8, 2);
            $table->float('price_sel', 8, 2);
            $table->integer('discount')->nullable();
            $table->string('warranty', 20)->nullable();
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
        Schema::dropIfExists('view_stocks');
    }
};
