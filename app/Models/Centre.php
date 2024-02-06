<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    use HasFactory;

   	protected $table = 'centre';
   	protected $fillable = ['region_id', 'county_id', 'centre_name','centre_slug'];
}
