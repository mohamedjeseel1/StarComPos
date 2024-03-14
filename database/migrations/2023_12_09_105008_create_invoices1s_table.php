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
        Schema::create('invoices1s', function (Blueprint $table) {
            $table->id();
            $table->string('invice_number', 10);
            $table->string('product_name', 10);
            $table->string('product_id', 10);
            $table->string('branch_id', 10);
            $table->string('unit', 10);
            $table->integer('quantity');
            $table->float('uni_price', 8, 2);
            $table->float('discount_per', 8, 2);
            $table->float('itemprice', 8, 2);
            $table->float('discount_price', 8, 2);
            $table->float('amt', 8, 2);
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
        Schema::dropIfExists('invoices1s');
    }
};
