<?php

use App\Models\User;
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
        Schema::create('registrars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('nim');
            $table->string('cv');
            $table->string('khs');
            $table->string('transkrip');
            $table->foreignIdFor(User::class)->nullable()->constrained()->cascadeOnDelete();
            $table->boolean('is_honor_taken')->default(false);
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
        Schema::dropIfExists('registrars');
    }
};
