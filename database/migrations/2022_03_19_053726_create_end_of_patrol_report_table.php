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
        Schema::create('end_patrol_reports', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('user_steam_hex');
            $table->string('patrol_id');
            $table->integer('town_runs');
            $table->integer('out_town_runs');
            $table->integer('assists');
            $table->integer('vehicles_towed');
            $table->integer('misdemeanor');
            $table->integer('felony');
            $table->integer('warrant');
            $table->integer('DUI');
            $table->integer('cases');
            $table->integer('crash');
            $table->boolean('deadly_force_used');
            $table->boolean('taser_used');
            $table->text('other_report_numbers')->nullable();
            $table->text('call_summary');

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
        Schema::dropIfExists('end_of_patrol_report');
    }
};
