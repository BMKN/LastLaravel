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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('courseModule');
            $table->string('MobileNumber');
            $table->string('lectureHandouts');
            $table->string('department');
            $table->string('supplyBooks');
            $table->string('methodofPayment');
            $table->string('collegeChoice');
            $table->string('addressLine1');
            $table->string('addressLine2');
            $table->string('Country');
            $table->string('eirCode');
            $table->string('module_0');
            $table->string('module_1');
            $table->string('module_2');
            $table->string('module_3');
            $table->string('module_4');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
