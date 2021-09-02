<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Students extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

            Schema::create('students', function (Blueprint $table) {
                
                $table->bigIncrements('id');
                $table->string('name',50);
                $table->string('email',80)->unique();
                $table->string('password',65);
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
        //
        Schema::dropIfExists('students');
    }
}


