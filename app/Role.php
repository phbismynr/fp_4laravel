<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = ['role'];

    public function mahasiswa(){
        return $this->hasOne('App\Mahasiswa');
    }
}
