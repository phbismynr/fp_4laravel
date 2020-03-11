<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = "mahasiswas";
    protected $fillable = ['nim', 'nama', 'kelas', 'role_id'];

    public function role(){
        return $this->belongsTo('App\Role');
    }
}
