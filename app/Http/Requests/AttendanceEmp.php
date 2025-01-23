<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceEmp extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|exists:employees',
            'pin_code' => 'required|numeric|min:4',
        ];
    }
}
