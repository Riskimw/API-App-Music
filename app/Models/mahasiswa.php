<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $fillable =['id_musik','nama_musik','nama_artis','foto','file_musik'];
    protected $table= 'mahasiswa';
}
