<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaprecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saprecords', function (Blueprint $table) {
            $table->id();
            $table->date('created');
            $table->string('voucher_no');
            $table->string('cv_no')->nullable();
            $table->integer('party_id')->nullable();
            $table->decimal('total_discount')->default(0);
            $table->decimal('total_bill')->default(0);
            $table->decimal('total_quantity')->default(0);
            $table->decimal('paid')->default(0);
            $table->string('due_status')->nullable();
            $table->string('sap_type')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('saprecords');
    }
}
