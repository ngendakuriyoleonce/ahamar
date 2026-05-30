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
        Schema::create('tblleavetype', function (Blueprint $table) {
            $table->id('IdT');
            $table->string('LeaveType', 50)->unique()->nullable();
            $table->mediumText('Description')->nullable();
            $table->timestamp('CreationDate')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleavetype');
    }
};
