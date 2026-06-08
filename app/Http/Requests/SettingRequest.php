<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //'
            'name' => 'nullable',
            'logo' => 'nullable',
            'favicon' => 'nullable',
            'phone' => 'nullable',
            'number' => 'nullable',
          'project' => 'nullable',
          'email' => 'nullable',
          'address' => 'nullable',
          'description' => 'nullable',
          
          'facebook' => 'nullable',
          'twitter' => 'nullable',
          'instagram' => 'nullable',
          'youtube' => 'nullable',
          'tiktok' => 'nullable',
          'meta' => 'nullable',
          'meta_description' => 'nullable',
          'keywords' => 'nullable',
          
        ];
    }
}
