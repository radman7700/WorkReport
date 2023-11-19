<?php

namespace Pishgaman\WorkReport\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkPoint extends Model
{
    protected $table = 'work_points';

    protected $fillable = [
        'name',
        'point',
    ];
}
