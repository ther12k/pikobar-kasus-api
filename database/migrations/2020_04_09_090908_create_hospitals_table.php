<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->string('province_code')->nullable();
            $table->string('city_code')->nullable();
            $table->string('district_code')->nullable();
            $table->string('village_code')->nullable();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_numbers')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->timestamps();

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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
