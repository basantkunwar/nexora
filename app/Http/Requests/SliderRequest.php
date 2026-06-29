<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

             'title'=>'required',
    'subtitle'=>'nullable',
    'button_text'=>'nullable',
    'button_link'=>'nullable',
    'position'=> 'required',
    'text_alignment'=>'nullable',
    'text_color'=>'nullable',
    'start_at'=>'required',
    'end_at'=>'required',
    'status'=>'required',
   'desktop_image' => $this->isMethod('post')
            ? 'required|desktop_image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|desktop_image|mimes:jpg,jpeg,png,webp|max:2048',
 'mobile_image' => $this->isMethod('post')
            ? 'required|mobile_image|mimes:jpg,jpeg,png,webp|max:2048'
            : 'nullable|mobile_image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }
}
