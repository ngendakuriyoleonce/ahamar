<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tblemployees', function (Blueprint $table) {
            $table->id('IdEmp');
            $table->string('EmpId', 50)->unique();
            $table->string('FirstName', 50)->nullable();
            $table->string('LastName', 50)->nullable();
            $table->string('EmailId', 50)->unique()->nullable();
            $table->string('Password', 255)->nullable();
            $table->string('Gender', 20)->nullable();
            $table->string('Department', 50)->nullable();
            $table->string('Address', 50)->nullable();
            $table->char('Phonenumber', 11)->nullable();
            $table->boolean('Status')->default(true);
            $table->timestamp('RegDate')->useCurrent();
            $table->integer('Role')->default(0);
            
            $table->index('EmailId');
            $table->index('Department');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblemployees');
    }
};
