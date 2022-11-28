<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpcrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opcrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('office_owner_id')
                ->constrained('offices');
            $table->foreignId('office_collaborator_id')
                ->constrained('offices');
            $table->foreignId('specific_action_id')
                ->constrained('specific_actions');
            $table->foreignId('opcr_owner_id')
                ->constrained('employees');
            $table->foreignId('approved_by_id')
                ->constrained('employees');
            $table->string('accomplishment');
            $table->string('rate_quality');
            $table->string('rate_efficiency');
            $table->string('rate_timeliness');
            $table->string('average_score');
            $table->string('remarks');
            $table->date('date_rated');
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
        Schema::dropIfExists('opcrs');
    }
}
