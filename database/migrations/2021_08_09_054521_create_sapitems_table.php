<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSapitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sapitems', function (Blueprint $table) {
            $table->id();
            $table->string('voucher_no');
            $table->integer('product_id');
            $table->decimal('quantity');
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
        Schema::dropIfExists('sapitems');
    }
}
