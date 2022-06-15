<?php

use App\Models\Period;
use App\Models\Subject;
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
        Schema::create('period_subject', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Period::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Subject::class)->constrained()->cascadeOnDelete();
            $table->integer('number_of_lab_assistant');
            $table->dateTime('exam_start');
            $table->dateTime('exam_end');
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
        Schema::dropIfExists('period_subjects');
    }
};
