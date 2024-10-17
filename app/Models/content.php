<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory;
    protected $table = 'content';
    protected $fillable = [
        'id',
        'name',
        'course_id',
    ];
}
