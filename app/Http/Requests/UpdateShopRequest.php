<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Voivodship;
use Illuminate\Validation\Rule;

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

        $voivodship = Voivodship::whereName($this->input('voivodship'))->firstOrFail();
        return [
            'name' => 'required',
            'city' => [
                'required',
                Rule::exists('cities', 'name')
                    ->where('voivodship_id', $voivodship->id)
                ],
            'address' => 'required',
            'images' => 'max:' . $imagesMax,
            'images.*' => 'max:2048|image',
        ];
    }

    public function messages()
    {
        return [
            'city.exists' => 'The city has to be belong to the voivodship ',
            'images.max' => 'Shop cant have more than 5 images',
            'images.*.image' => 'FIle type has to be an image',
        ];
    }
}
