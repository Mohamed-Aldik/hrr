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
            $table->double('probation_period', 15, 2)->nullable(); 
            $table->double('annual_balance', 15, 2)->nullable();
            $table->double('basic_salary', 15, 2)->nullable();
            $table->double('total_salary', 15, 2)->nullable();
            $table->double('gosi_salary', 15, 2)->nullable();
            $table->double('gosi_dedc', 15, 2)->nullable();
            $table->double('net_salary', 15, 2)->nullable();
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
