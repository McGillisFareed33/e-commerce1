<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule; // Import Rule

class UpdateUserRequest extends FormRequest
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
    public function rules(): array
    {
        $method = $this->method();
        $userId = $this->route('user')->id;
        
        if($method == 'PUT'){
            return [
                'username' => 'required|unique:users',
                'userTitle' =>  'required',
                'password' =>  'required|min:6',
            ];
        }else{
            return [
                'username' => [
                    'sometimes',
                    'required',
                    Rule::unique('users')->ignore($userId),
                ],
                'userTitle' => 'sometimes|required',
                'password' => [
                    'sometimes',
                    'required',
                    'min:6',
                ],
            ];
        }
        
    }
    protected function prepareForValidation(){
       
        $data = [];

        if ($this->has('username')) {
            $data['Username'] = $this->username;
        }

        if ($this->has('userTitle')) {
            $data['UserTitle'] = $this->userTitle;
        }

        if ($this->has('password')) {
            $data['password'] = $this->password;
        }

        $this->merge($data);
    }
    protected function passedValidation()
    {
        if($this->password){
        $this->merge([
            'password' => Hash::make($this->password),
        ]);
        }
    }
}
