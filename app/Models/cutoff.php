<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cutoff extends Model
{
    protected $fillable = [
        'year',
        'college_code',
        'college_name',
        'branch_code',
        'branch_name',
        'category',
        'percentile'
    ];

    public $timestamps = false;
}