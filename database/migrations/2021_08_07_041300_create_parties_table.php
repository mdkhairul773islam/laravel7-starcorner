<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->date('created')->nullable();
            $table->string('name');
            $table->string('contact_person')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('remarks')->nullable();
            $table->decimal('initial_balance', 10, 2);
            $table->string('party_type')->nullable();
            $table->string('status')->default('active');
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
        Schema::dropIfExists('parties');
    }
}
