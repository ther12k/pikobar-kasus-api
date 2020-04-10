<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('occupation_id');
            $table->unsignedBigInteger('author_id');
            $table->string('id_case')->nullable();
            $table->string('id_case_national')->nullable();
            $table->string('id_case_related')->nullable();
            $table->string('nik')->nullable();
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->unsignedInteger('age');
            $table->string('gender');
            $table->string('address')->nullable();
            $table->string('office_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nationality_name')->nullable();
            $table->softDeletes();
            $table->string('verified_status')->nullable();
            $table->string('verified_comment', 2000)->nullable();
            

            $table->foreign('area_id')
                ->references('id')
                ->on('areas');

            $table->foreign('occupation_id')
                ->references('id')
                ->on('occupations');

            $table->foreign('author_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('medical_cases');
    }
}
