<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->boolean('admin')->default(false); 
            //$table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade')->default(1);
            $table->rememberToken();
            $table->timestamps();
        
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
