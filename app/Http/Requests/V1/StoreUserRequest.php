<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users',
            'userTitle' =>  'required',
            'password' =>  'required|min:6',
        ];
    }
    protected function prepareForValidation(){
        $this->merge([
            'Username' => $this->username,
            'UserTitle' => $this->userTitle,
            'password' => $this->password,
        ]);
    }
    protected function passedValidation()
    {
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
    }
}
