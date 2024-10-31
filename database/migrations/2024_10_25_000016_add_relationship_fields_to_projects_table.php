<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('ward_id')->nullable();
            $table->foreign('ward_id', 'ward_fk_10112965')->references('id')->on('wards');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id', 'department_fk_10112966')->references('id')->on('departments');
            $table->unsignedBigInteger('financial_year_id')->nullable();
            $table->foreign('financial_year_id', 'financial_year_fk_10112968')->references('id')->on('financial_years');
        });
    }
}
