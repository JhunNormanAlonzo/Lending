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
        Schema::create('paid_bills', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->nullable();
            $table->string('ornumber');
            $table->integer('member_id');
            $table->integer('amount');
            $table->string("tag");
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
        Schema::dropIfExists('paid_bills');
    }
};
