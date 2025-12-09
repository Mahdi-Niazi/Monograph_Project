<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('userID'); // PRIMARY KEY

            $table->integer('empID'); // FK to employees.empID
            $table->string('username')->unique();
            $table->string('password');

            // optional timestamps — if your table did not have them:
            $table->timestamps();

            // foreign key
            $table->foreign('empID')
                  ->references('empID')
                  ->on('employees')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
