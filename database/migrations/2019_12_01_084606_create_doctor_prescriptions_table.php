<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_prescriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('gender');
            $table->string('mobile');
            $table->string('birthday');
            $table->string('age');
            $table->string('height');
            $table->string('weight');
            $table->string('blood_pressure');
            $table->string('diabetes');
            $table->string('address');
            $table->string('appointment_id');
            $table->string('patient_id');
            $table->string('doctor_id');
            $table->string('clinic_id');
            $table->string('symptoms');
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
        Schema::dropIfExists('doctor_prescriptions');
    }
}
