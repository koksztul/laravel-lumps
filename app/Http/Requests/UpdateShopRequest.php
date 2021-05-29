<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShopRequest extends FormRequest
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
        $shop = $this->route('shop');
        $imagesMax = 5 - $shop->images->count();

        return [
            'name' => 'required',
            'city' => 'required',
            'address' => 'required',
            'images' => 'max:' . $imagesMax,
            'images.*' => 'max:2048|image',
        ];
    }

    public function messages()
    {
        return [
            'images.max' => 'Shop cant have more than 5 images',
            'images.*.image' => 'FIle type has to be an image',
        ];
    }
}
