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
        Schema::create('psr', function (Blueprint $table) {
            $table->id();
            // $table->foreignIdFor(PeriodSubject::class)->constrained()->cascadeOnDelete();
            $table->foreignId('period_subject_id')->references('id')->on('period_subject')->cascadeOnDelete();
            $table->foreignIdFor(Registrar::class)->constrained()->cascadeOnDelete();
            $table->boolean('is_pass_file_selection')->default(false);
            $table->boolean('is_take_exam_selection')->default(false);
            $table->boolean('is_pass_exam_selection')->default(false);
            // $table->boolean('is_honor_taken')->default(false);
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
        Schema::dropIfExists('psr');
    }
};
