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
            $table->string('province_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('village_code')->nullable();

            $table->string('nik')->unique()->nullable();
            $table->string('name');
            $table->unsignedBigInteger('occupation_id');
            $table->unsignedBigInteger('author_id');
            $table->string('id_case')->nullable();
            $table->string('id_case_national')->nullable();
            $table->string('id_case_related')->nullable();
            $table->date('birth_date')->nullable();
            $table->unsignedInteger('age');
            $table->string('gender')->index();
            $table->string('address')->nullable();
            $table->string('office_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('nationality')->nullable();
            $table->unsignedBigInteger('nationality_country_id');
            $table->string('verified_status')->nullable();
            $table->string('verified_comment', 2000)->nullable();

            $table->foreign('province_code')
                ->references('code_kemendagri')
                ->on('areas');

            $table->foreign('city_code')
                ->references('code_kemendagri')
                ->on('areas');

            $table->foreign('district_code')
                ->references('code_kemendagri')
                ->on('areas');

            $table->foreign('village_code')
                ->references('code_kemendagri')
                ->on('areas');

            $table->foreign('nationality_country_id')
                ->references('id')
                ->on('countries');

            $table->foreign('occupation_id')
                ->references('id')
                ->on('occupations');

            $table->foreign('author_id')
                ->references('id')
                ->on('users');

            $table->softDeletes();
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
