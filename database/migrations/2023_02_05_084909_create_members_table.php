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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->text('address');
            $table->integer('age');
            $table->date('birthday');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('contact_number');
            $table->string('co_maker_name');
            $table->string('co_maker_address');
            $table->string('co_maker_contact_number');
            $table->string('co_maker_rel_to_mem');
            $table->string('guarantor_name');
            $table->string('guarantor_address');
            $table->string('guarantor_contact_number');
            $table->string('guarantor_rel_to_mem');
            $table->integer('group_id');
            $table->timestamps();
        });
    }

//
//Full Name
//Address
//Age
//Birth Date
//Gender
//Civil status
//Contact #
//
//Name of co Maker
//Address
//Contact #
//Relation to member
//
//Name of guarantor
//Address
//contact #
//Relation to member
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
};
