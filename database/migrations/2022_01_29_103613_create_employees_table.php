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
            $table->string('name', 100)->nullable()->default('name_employe');
            $table->string('last_name', 100)->nullable()->default('last_name_employe');
            $table->string('email', 100)->unique();
            $table->string('phone', 100)->nullable()->default('9234689890');
            $table->unsignedBigInteger('company')->nullable();
            $table->foreign('company')->references('id')->on('companies');
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
