<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\Masternilai;

class Siswa extends Model
{
    protected $table = 'siswa';

    public function masternilai()
    {
        return $this->hasMany('App\Masternilai');
    }
}
