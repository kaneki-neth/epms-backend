<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipcrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opcr_owner_id')
                ->constrained('employees');
            $table->foreignId('reviewed_by')
                ->constrained('employees');
            $table->foreignId('approved_by')
                ->constrained('employees');
            $table->string('actual_accomplishment');
            $table->string('distribution');
            $table->string('rate_quality');
            $table->string('rate_efficiency');
            $table->string('rate_timeliness');
            $table->string('rate_average');
            $table->string('average_score');
            $table->string('remarks');
            $table->string('recommends');
            $table->date('date_rated');
            $table->date('date_reviewed');
            $table->date('date_approved');
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
        Schema::dropIfExists('ipcrs');
    }
}
