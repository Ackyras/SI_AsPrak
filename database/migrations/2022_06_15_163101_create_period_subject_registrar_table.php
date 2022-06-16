<?php

use App\Models\PeriodSubject;
use App\Models\Registrar;
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
        Schema::create('period_subject_registrar', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(PeriodSubject::class)->constrained()->cascadeOnDelete();
            $table->foreignId('period_subject_id')->references('id')->on('period_subject')->cascadeOnDelete();
            $table->foreignIdFor(Registrar::class)->constrained()->cascadeOnDelete();
            $table->boolean('is_pass_file_selection');
            $table->boolean('is_pass_exam_selection');
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
        Schema::dropIfExists('period_subject_registrars');
    }
};