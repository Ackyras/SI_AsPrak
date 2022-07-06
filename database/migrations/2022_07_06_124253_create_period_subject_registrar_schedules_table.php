<?php

use App\Models\PeriodSubjectRegistrar;
use App\Models\Schedule;
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
        Schema::create('period_subject_registrar_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('psr_id')->unsigned();
            $table->bigInteger('schedule_id')->unsigned();
            // $table->foreignId('psr_id')->references('id')->on('period_subject_registrar')->cascadeOnDelete();
            // $table->foreignId('schedule_id')->references('id')->on('schedule')->cascadeOnDelete();
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
        Schema::dropIfExists('period_subject_registrar_schedules');
    }
};
