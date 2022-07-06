<?php

use App\Models\Choice;
use App\Models\PeriodSubjectRegistrar;
use App\Models\Question;
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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->foreignIdFor(Choice::class)->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('period_subject_registrar_id')->references('id')->on('period_subject_registrar')->cascadeOnDelete();
            $table->foreignIdFor(Question::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('answers');
    }
};
