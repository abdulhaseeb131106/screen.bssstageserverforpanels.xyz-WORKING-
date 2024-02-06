<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateId extends Model
{
    use HasFactory;

   	protected $table = 'date_id';
   	protected $fillable = ['date_id'];
}
