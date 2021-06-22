<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return !empty($this->user());
    }

    public function rules(): array
    {
        $rules = self::getRules();

        $rules['publication_date'] .=  '|after_or_equal:' . date("Y-m-d");

        return $rules;
    }

    public static function getRules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'publication_date' => 'required|date'
        ];
    }
}
