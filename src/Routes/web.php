<?php

use Illuminate\Support\Facades\Route;
use Pishgaman\WorkReport\Controllers\web\WorkReportController;

Route::get('/user/work/report', [WorkReportController::class, 'index'])->name('WorkReport_getWorkList')->middleware(['auth','CheckMenuAccess','web']);
