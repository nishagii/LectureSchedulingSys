<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleEmp extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'slug' => 'required|string|min:3|max:32|alpha_dash',
            'time_in' => 'required|date_format:H:i|before:time_out',
            'time_out' => 'required|date_format:H:i',
        ];
    }
}
