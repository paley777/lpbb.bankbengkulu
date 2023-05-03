<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePreTestRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_pretest' => 'required|unique:pre_tests,nama_pretest,' . $this->pre_test->id . ',id',
            'nama_bank' => 'required',
            'jumlah_soal' => 'required',
            'durasi' => 'required',
        ];
    }
}
