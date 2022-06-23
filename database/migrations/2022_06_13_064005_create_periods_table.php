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
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('registration_start');
            $table->dateTime('registration_end');
            $table->boolean('is_active')->default(true);
            $table->dateTime('is_active_date')->nullable();
            $table->boolean('is_open_for_selection')->default(false);
            $table->dateTime('is_open_for_selection_date')->nullable();
            $table->string('selection_poster')->nullable();
            $table->boolean('is_file_selection_over')->default(false);
            $table->dateTime('is_file_selection_over_date')->nullable();
            $table->boolean('is_exam_selection_over')->default(false);
            $table->dateTime('is_exam_selection_over_date')->nullable();
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
        Schema::dropIfExists('periods');
    }
};
