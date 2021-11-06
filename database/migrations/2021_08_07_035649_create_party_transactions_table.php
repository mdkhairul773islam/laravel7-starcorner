<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('created');
            $table->integer('party_id');
            $table->decimal('debit')->default(0);
            $table->decimal('credit')->default(0);
            $table->decimal('remission')->default(0);
            $table->decimal('commission')->default(0);
            $table->string('transaction_by')->nullable();
            $table->string('transaction_method')->nullable();
            $table->string('relation')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('party_transactions');
    }
}
