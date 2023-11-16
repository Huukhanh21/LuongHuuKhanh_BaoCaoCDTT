<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'email' => 'required|unique:customer',
            'username' => 'required|unique:customer',
            'phone' => 'required|unique:customer',
        ];
    }
    public function messages()
    {
        return[
            'email.unique' => 'Email đã tồn tại',
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại'
        ];
    }
}
