<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_records', function (Blueprint $table) {
            $table->id();
            $table->date('created');
            $table->string('shift');
            $table->decimal('input1');
            $table->decimal('input2');
            $table->decimal('input3');
            $table->decimal('input4');
            $table->decimal('input5');
            $table->decimal('input6');
            $table->decimal('input7');
            $table->decimal('input8');
            $table->decimal('input9');
            $table->decimal('input10');
            $table->decimal('input11');
            $table->decimal('input12');
            $table->decimal('input13');
            $table->decimal('input14');
            $table->decimal('input15');
            $table->decimal('input16');
            $table->decimal('input17');
            $table->decimal('input18');
            $table->softDeletes('deleted_at');
            $table->timestamps();
            $table->index(['created', 'shift']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sale_records');
    }
}
