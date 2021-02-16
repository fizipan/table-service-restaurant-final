<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteAllFieldExceptOrdersIdFieldAtTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('products_id');
            $table->dropColumn('status');
            $table->dropColumn('pay_bills');
            $table->dropColumn('money_change');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreignId('products_id');
            $table->string('status');
            $table->integer('pay_bills');
            $table->integer('money_change');
        });
    }
}
