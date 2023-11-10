<?php

namespace Pishgaman\WorkReport\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishgaman\Pishgaman\Database\Models\User\User as Employee;

class WorkReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'employee_name',
        'date',
        'start_time',
        'end_time',
        'description',
        'outcome',
        'project_task',
        'location',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
