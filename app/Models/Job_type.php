<?php
 namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_type extends Model
{
    protected $table = 'job_types';

    protected $fillable = [
        'type',
        'title',
    ];
}