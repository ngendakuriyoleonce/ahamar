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
        Schema::create('tblleaves', function (Blueprint $table) {
            $table->id('IdLeave');
            $table->string('LeaveType', 50)->nullable();
            $table->date('ToDate')->nullable();
            $table->date('FromDate')->nullable();
            $table->integer('DayNumber');
            $table->mediumText('Description')->nullable();
            $table->timestamp('PostingDate')->useCurrent();
            $table->mediumText('AdminRemark')->nullable();
            $table->string('AdminRemarkDate', 50)->nullable();
            $table->integer('Status')->default(0);
            $table->integer('IsRead')->default(0);
            $table->unsignedBigInteger('empid')->nullable();
            
            $table->index('empid');
            $table->index('Status');
            $table->foreign('empid')->references('IdEmp')->on('tblemployees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblleaves');
    }
};
