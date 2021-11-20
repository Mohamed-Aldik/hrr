<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('gender')->nullable();
            $table->bigInteger('job_number')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('id_number')->nullable();
            $table->foreignId('nationality_id')->nullable()->constrained('nationalities');
            $table->foreignId('job_title_id')->nullable()->constrained('job_titles');
            $table->dateTime('birthday')->nullable();
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
        Schema::dropIfExists('employees');
    }
}
