<?php

namespace App\Imports;

use App\Models\Soal;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\BankSoal;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SoalsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $request = request()->all();
        $nama_bank = BankSoal::where('id', $request['bankid'])->first()->nama_bank;
        return new Soal([
            'nama_bank' => $nama_bank,
            'soal' => $row['soal'],
            'ans_a' => $row['opsi_a'],
            'ans_b' => $row['opsi_b'],
            'ans_c' => $row['opsi_c'],
            'ans_d' => $row['opsi_d'],
            'correct_ans' => $row['correct'],
        ]);
    }
}
