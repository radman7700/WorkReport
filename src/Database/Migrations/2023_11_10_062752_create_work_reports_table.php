<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('work_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('description');
            $table->text('outcome')->nullable();
            $table->string('project_task');
            $table->string('location')->nullable();
            $table->timestamps();
        });
 
        DB::table('menus')->insert([
            'order' => '2',
            'parent_id' => '1',
            'name' => 'WorkList',
            'packeage' => 'WorkReportLang',
            'route' => 'WorkReport_getWorkList',
            'icon' => 'fa fa-tasks',
        ]);        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_reports');
        DB::table('menus')->where('name','WorkList')->delete();
    }
};
