<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\Penguji;
use App\Siswa;


class Masternilai extends Model
{
    //
    protected $table = 'masternilai';

    protected $fillable = [
        'id_siswa', 'id_penguji', 'status_penguji','nilai_subkat_1','nilai_subkat_2','nilai_subkat_3','nilai_subkat_4','nilai_subkat_5','nilai_subkat_6','nilai_subkat_7','nilai_subkat_8','nilai_subkat_9','nilai_subkat_10','nilai_subkat_11','nilai_subkat_12','total_subkat_1','total_subkat_2','total_subkat_3','total_subkat_4','total_subkat_5','total_subkat_6','total_subkat_7','total_subkat_8','total_subkat_9','total_subkat_10','total_subkat_11','total_subkat_12','total_nilai_subkat'];
    
        public function penguji()
        {
            return $this->belongsTo('App\Penguji');
        }
    
        public function siswa()
        {
            return $this->belongsTo('App\Siswa');
        }


}
