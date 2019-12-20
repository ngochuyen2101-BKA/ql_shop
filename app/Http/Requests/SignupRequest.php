<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Email không được để trống.',
            'email.email'=>'Email không đúng định dạng',
            'email.unique'=>'Email đã được sử dụng',
            'password.required'=>'Mật khẩu không được để trống.',
            'password.min'=>'mật khẩu có số ký tự nhỏ nhất là 5',
        ];
    }
}
