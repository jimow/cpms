<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSubCountiesTable extends Migration
{
    public function up()
    {
        Schema::table('sub_counties', function (Blueprint $table) {
            $table->unsignedBigInteger('county_id')->nullable();
            $table->foreign('county_id', 'county_fk_10112921')->references('id')->on('counties');
        });
    }
}
