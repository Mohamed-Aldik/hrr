<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->nullable()->constrained('employees');
            $table->dateTime('joining_date')->nullable();
            $table->dateTime('end_date')->nullable(); 
            $table->double('probation_period')->nullable(); 
            $table->double('annual_balance')->nullable();
            $table->double('basic_salary')->nullable();
            $table->double('total_salary')->nullable();
            $table->double('gosi_salary')->nullable();
            $table->double('gosi_dedc')->nullable();
            $table->double('net_salary')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
