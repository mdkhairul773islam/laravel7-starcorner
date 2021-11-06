<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMachineRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_records', function (Blueprint $table) {
            $table->id();
            $table->date('created')->index('created');
            $table->string('shift')->index('shift');
            $table->integer('sale_report_id')->index('sale_report_id');
            $table->integer('machine_id')->index('machine_id');
            $table->decimal('previous_reading');
            $table->decimal('current_reading');
            $table->decimal('purchase_price');
            $table->decimal('sale_price');
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
        Schema::dropIfExists('machine_records');
    }
}
