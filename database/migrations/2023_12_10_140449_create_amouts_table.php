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
        Schema::create('amouts', function (Blueprint $table) {
            $table->id();
            $table->string('invice_number', 10);
            $table->float('payment', 8, 2);
            $table->float('balance', 8, 2);
            $table->string('status', 10);
            $table->float('total', 8, 2);
            $table->float('discount', 8, 2);
            $table->float('netAmt', 8, 2);
            $table->string('customer_id', 10)->nullable();
            $table->string('branch_id', 10);
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
        Schema::dropIfExists('amouts');
    }
};
