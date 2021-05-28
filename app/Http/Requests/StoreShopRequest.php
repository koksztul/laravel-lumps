<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->user()->id,
        ]);
    }
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
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'images' => 'max:5',
            'images.*' => 'max:2048|image',
        ];
    }

    public function messages()
    {
        return [
            'images.max' => 'Coudnt add more than 5 images',
            'images.*.image' => 'FIle type has to be an image',
        ];
    }
}
