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
        Schema::create('tbldepartments', function (Blueprint $table) {
            $table->id('IdDep');
            $table->string('DepartmentName', 50)->nullable();
            $table->string('DepartmentShortName', 50)->nullable();
            $table->string('DepartmentCode', 50)->nullable();
            $table->timestamp('CreationDate')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbldepartments');
    }
};
