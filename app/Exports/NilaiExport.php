<?php

namespace App\Exports;

use App\Masternilai;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Masternilai::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Nama Penguji',
            'Kelas Penguji',
            'Nilai Sub Kategori 1 Bobot 2,5%',
            'Nilai Sub Kategori 2 Bobot 2,5%',
            'Nilai Sub Kategori 3 Bobot 10%',
            'Nilai Sub Kategori 4 Bobot 10%',
            'Nilai Sub Kategori 5 Bobot 10%',
            'Nilai Sub Kategori 6 Bobot 10%',
            'Nilai Sub Kategori 7 Bobot 5%',
            'Nilai Sub Kategori 8 Bobot 10%',
            'Nilai Sub Kategori 9 Bobot 10%',
            'Nilai Sub Kategori 10 Bobot 5%',
            'Nilai Sub Kategori 11 Bobot 10%',
            'Nilai Sub Kategori 12 Bobot 15%',
            'Total Nilai',
        ];
    }
}
