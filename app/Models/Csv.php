<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Csv extends Model
{
    protected $table = ['Csv'];
    protected $fillable = ['fileName', 'filePath'];

    public function setFileNameAttribute($value)
    {
        $this->attributes['fileName'] = time() . '_' . $value->getClientOriginalName();
        $this->attributes['filePath'] = 'uploads/' . $this->attributes['fileName'];
        $value->move(public_path('uploads'), $this->attributes['fileName']);
    }
}


?>
