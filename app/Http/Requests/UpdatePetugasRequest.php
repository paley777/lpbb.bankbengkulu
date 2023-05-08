<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePetugasRequest extends FormRequest
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
            'name' => 'required',
            'nrpp' => 'required|unique:users,nrpp,' . $this->petuga->id . ',id',
            'jabatan' => 'required',
            'unit_kerja' => 'required',
            'role' => 'required',
            'email' => 'required|unique:users,email,' . $this->petuga->id . ',id',
            'password' => 'required',
        ];
    }
}
