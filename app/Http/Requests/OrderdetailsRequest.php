<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderdetailsRequest extends FormRequest
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
            //
            'number'=>'required',
            'province'=>'required',
            'district'=>'required',
            'manicipality'=>'required',
            'ward'=>'required',
            'address'=>'required',
            'landmark'=>'required',
            'ordernote'=>'required',
        ];
    }
}