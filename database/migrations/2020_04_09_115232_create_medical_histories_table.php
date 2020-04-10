<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medical_case_id');
            $table->unsignedBigInteger('hospital_id');
            $table->string('status')->nullable();
            $table->string('stage')->nullable();
            $table->string('final_result')->nullable();
            $table->date('last_changed')->nullable();
            $table->boolean('is_went_abroad')->default(false);
            $table->string('visited_country')->nullable();
            $table->boolean('is_went_other_city')->default(false);
            $table->string('visited_city')->nullable();
            $table->boolean('is_contact_with_positive')->default(false);
            $table->string('history_notes', 2000)->nullable();
            $table->boolean('is_sample_taken')->default(false);
            $table->string('report_source')->nullable();
            $table->date('first_symptom_date')->nullable();
            $table->string('other_notes')->nullable();
            $table->timestamps();

            
            $table->foreign('medical_case_id')
                ->references('id')
                ->on('medical_cases');

            $table->foreign('hospital_id')
                ->references('id')
                ->on('hospitals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
}
