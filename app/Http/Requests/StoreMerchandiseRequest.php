<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMerchandiseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'merch_name' => 'required|max:255',
            'keyword' => 'required|max:255',
            'verification_keyword' => 'max:255',
            'image' => 'required|image|file|max:1024',
            'minimal_point' => 'required'
        ];
    }
}
