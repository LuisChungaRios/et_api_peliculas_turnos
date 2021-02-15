<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HourFormRequest extends FormRequest
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
            'hour' => 'required|date_format:H:i',
            'active' => 'boolean',
        ];
    }
}
