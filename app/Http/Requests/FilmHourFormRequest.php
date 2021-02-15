<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmHourFormRequest extends FormRequest
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
            'hour_id' => 'required|int|exists:hours,id',
            'film_id' => 'required|int|exists:films,id',
        ];
    }
}
