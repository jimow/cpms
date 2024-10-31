<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('feedback_project', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id', 'project_id_fk_10219513')->references('id')->on('projects')->onDelete('cascade');
            $table->unsignedBigInteger('feedback_id');
            $table->foreign('feedback_id', 'feedback_id_fk_10219513')->references('id')->on('feedbacks')->onDelete('cascade');
        });
    }
}
