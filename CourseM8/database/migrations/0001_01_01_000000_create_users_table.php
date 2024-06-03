<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('firstName');
        $table->string('lastName');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('bio')->nullable();
        $table->integer('age')->nullable();
        $table->string('studyAreas')->nullable();
        $table->string('course')->nullable();
        $table->string('year_of_study')->nullable();
        $table->string('major')->nullable();
        $table->string('career_aspirations')->nullable();
        $table->text('study_preferences')->nullable();
        $table->text('study_location')->nullable();
        $table->string('study_method')->nullable();
        $table->string('learning_style')->nullable();
        $table->text('note_taking')->nullable();
        $table->text('review_method')->nullable();
        $table->string('group_size')->nullable();
        $table->string('study_frequency')->nullable();
        $table->text('collaboration_tools')->nullable();
        $table->timestamps();
    });
}

};
