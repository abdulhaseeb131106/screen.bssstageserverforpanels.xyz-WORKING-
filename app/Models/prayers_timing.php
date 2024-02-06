<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prayers_timing extends Model
{
    use HasFactory;
    protected $table = 'prayers_timings';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
