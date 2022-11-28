<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecificActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specific_actions', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('output_indicator');
            $table->float('budget', 15, 2);
            $table->foreignId('performance_target_id')
                ->constrained('performance_targets');
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
        Schema::dropIfExists('specific_actions');
    }
}
