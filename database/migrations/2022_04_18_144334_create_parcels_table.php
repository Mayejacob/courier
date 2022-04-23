<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_number')->nullable();
            $table->string('sender_name');
            $table->text('sender_address');
            $table->string('sender_contact');
            $table->string('recipient_name');
            $table->text('recipient_address');
            $table->string('recipient_contact')->nullable();
            $table->string('type')->nullable();
            $table->string('from_branch_id')->nullable();
            $table->string('to_branch_id')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('price')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('parcels');
    }
}
