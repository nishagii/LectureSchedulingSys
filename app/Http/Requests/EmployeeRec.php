<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRec extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:64|alpha_dash',
            'position' => 'required|string|min:3|max:64|alpha_dash',
            'schedule' => 'required|exists:schedules,slug',
        ];
    }
}
