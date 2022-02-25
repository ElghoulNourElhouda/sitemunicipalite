<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OffreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;  // anyone can make this request right now
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'work' => 'required|min:3',
            'level' => 'required|min:3',
            'formation' => 'required|min:3',
            'location' => 'required|min:3',
            'description' => 'required',
          //  'vector' => 'required|image',
            'published_at' => 'date'

        ];
    }
}
