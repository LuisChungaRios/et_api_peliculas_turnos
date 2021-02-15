<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmFormRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string',
            'publication_date' => 'required|date',
            'image' => 'required|image|max:5000'];
        if (in_array($this->method(), ['PUT','PATCH'])) {
            $rules['image'] = 'nullable|image|max:5000';
        }
        return $rules;
    }
}
