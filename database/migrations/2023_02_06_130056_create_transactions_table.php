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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("member_id")->default(0);
            $table->string("loan_amount")->default(0);
            $table->integer("loan_amt_to_rcv")->default(0);
            $table->integer("weekly_amortzn")->default(0);
            $table->integer("rsf")->default(0);
            $table->integer("ac")->default(0);
            $table->string("tag")->default("loan");
            $table->integer("loan_type_id")->default(0);
            $table->integer("loan_officer_id")->default(0);
            $table->string('or_number')->default('loan');
            $table->integer('cycle_no')->default(0);
            $table->string('reference')->nullable();
            $table->text("photo")->nullable();
            $table->integer('is_closed')->default(0);
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
        Schema::dropIfExists('transactions');
    }
};
