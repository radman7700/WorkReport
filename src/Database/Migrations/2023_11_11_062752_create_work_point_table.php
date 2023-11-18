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
        Schema::create('work_points', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->Integer('point')->default(0)->nullable();
            $table->timestamps();
        });
 
        DB::table('work_points')->insert([
            'name' => 'سوژه‌یابی',
            'point' => '6',
        ]);  
        DB::table('work_points')->insert([
            'name' => 'مستندسازی',
            'point' => '6',
        ]);   
        DB::table('work_points')->insert([
            'name' => 'ارسال خبرنامه',
            'point' => '3',
        ]);  
        DB::table('work_points')->insert([
            'name' => 'ارسال خبر',
            'point' => '3',
        ]);   
        DB::table('work_points')->insert([
            'name' => 'ارسال بصر',
            'point' => '2',
        ]);  
        DB::table('work_points')->insert([
            'name' => 'برنامه نویسی',
            'point' => '10',
        ]);     
        DB::table('work_points')->insert([
            'name' => 'آموزش',
            'point' => '10',
        ]);    
        DB::table('work_points')->insert([
            'name' => 'سایر',
            'point' => '1',
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
