<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;

class PetugasImport implements ToModel, WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'nrpp' => $row[0],
            'email' => $row[1],
            'name' => $row[2],
            'jabatan' => $row[3],
            'unit_kerja' => $row[4],
            'password' => Hash::make($row[5]),
            'role' => $row[6],
        ]);
    }
    public function rules(): array
    {
        return [
            '0' => 'unique:users,nrpp',
            '1' => 'unique:users,email',
        ];
    }
    public function customValidationMessages()
    {
        return [
            '0.unique' => 'NRPP telah ada sebelumnya. NRPP adalah value yang unique. Pastikan NRPP berbeda satu sama lain.',
            '1.unique' => 'Username telah ada sebelumnya. Username adalah value yang unique. Pastikan Username berbeda satu sama lain.',
        ];
    }
}
