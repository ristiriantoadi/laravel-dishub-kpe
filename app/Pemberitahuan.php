<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Pemberitahuan extends Model
{
    //
    // use HasFactory;    

    protected $fillable = [
        'judul',
        'keterangan',
    ];
    
    protected $attributes = [
        'file_upload' => ""
    ];
}
