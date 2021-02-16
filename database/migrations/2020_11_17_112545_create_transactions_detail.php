<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transactions_id');
            $table->foreignId('products_id');
            $table->string('status');
            $table->integer('pay_bills');
            $table->integer('money_change');
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
        Schema::dropIfExists('transactions_detail');
    }
}
