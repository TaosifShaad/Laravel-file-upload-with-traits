<?php

namespace App\Models;

use App\Http\Traits\FileTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    use FileTrait;
    protected $fillable = [
        'name',
        'file_name'
    ];

    public function setFileNameAttribute($value)
    {
        $path = 'files/';
        $this->attributes['file_name'] = $this->upload($value, $path);
    }
}
