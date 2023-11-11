<?php

namespace Pishgaman\WorkReport\Database\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishgaman\Pishgaman\Database\Models\User\User as Employee;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public $timestamps = true;
}
