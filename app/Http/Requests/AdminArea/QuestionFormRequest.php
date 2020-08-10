<?php

namespace App\Http\Requests\AdminArea;

use Illuminate\Foundation\Http\FormRequest;

class QuestionFormRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => [
                'required', 
                'string',
                'min:1',
            ],

            'skill_id' => [
                'sometimes',
                'exists:skills,id',
            ],
        ];
    }
}
