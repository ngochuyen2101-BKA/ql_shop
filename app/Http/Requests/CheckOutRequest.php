<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
        'full'=>'required|min:7',
        'address'=>'required',
        'province'=>'required',
        'district'=>'required',
	    'email'=>'required|email',
        'phone'=>'required|min:7|max:11'
            
        ];
    }
    public function messages()
    {
        return [
        'full.required'=>'Không được để trống Họ Tên',
        'full.min'=>'Họ Tên Không được nhỏ hơn 7 ký tự',
        'address.required'=>'Không được để trống địa chỉ',
        'province.required'=>'Không được để trống tỉn/thành phố',
        'district.required'=>'Không được để trống quận/huyện',
        'email.required'=>'Email không được để trống',
        'email.email'=>'Email Không đúng định dạng',
        'phone.required'=>'Không được để trống Số Điện thoại',
        'phone.min'=>'Số Điện thoại không được nhỏ hơn 7 ký tự',
        'phone.max'=>'Số Điện thoại không được lớn hơn 11 ký tự',
        ];
    }
}
