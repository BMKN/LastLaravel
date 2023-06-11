<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('course_module')->nullable();
            $table->text('pain_module')->nullable();
            $table->text('uk_legal');
            $table->text('species_specific_1');
            $table->text('species_specific_2');
            $table->text('course_name');
            $table->text('species_specific');
            $table->text('student_comments');
            $table->text('handling');
            $table->text('date_of_exam');
            $table->text('date_of_uk_exam');
            $table->text('comment_on_results');
            $table->text('invoice_number');
            $table->text('date_of_course');
            $table->text('final_price');
            $table->text('terms_and_conditions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
