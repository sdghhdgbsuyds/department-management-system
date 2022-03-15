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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('user_steam_hex')->references('steam_hex')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('status')->default(1);
            $table->integer('application_form_id')->references('id')->on('application_forms');
            $table->json('questions');
            $table->longText('comments')->nullable();
            $table->longText('history')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->index('user_steam_hex');
        });

        DB::statement("ALTER TABLE applications AUTO_INCREMENT = 3824;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
