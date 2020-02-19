<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\Masternilai;

class Penguji extends Model
{
    protected $table = 'penguji';

    public function masternilai()
    {
        return $this->hasMany('App\Masternilai');
    }
}
