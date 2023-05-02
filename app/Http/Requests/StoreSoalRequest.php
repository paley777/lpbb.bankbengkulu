<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSoalRequest extends FormRequest
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
            'nama_bank' => 'required',
            'bankid' => 'required',
            'soal' => 'required',
            'ans_a' => 'required',
            'ans_b' => 'required',
            'ans_c' => 'required',
            'ans_d' => 'required',
            'correct_ans' => 'required',
        ];
    }
}
