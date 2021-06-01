<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Voivodship;
use Illuminate\Validation\Rule;

class StoreShopRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $voivodship = Voivodship::whereName($this->input('voivodship'))->firstOrFail();
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
        $voivodship = Voivodship::whereName($this->input('voivodship'))->firstOrFail();
        return [
            'name' => 'required',
            'city' => [
                'required',
                Rule::exists('cities', 'name')
                    ->where('voivodship_id', $voivodship->id)
                ],
            'voivodship' => 'required|exists:voivodships,name',
            'address' => 'required',
            'images' => 'max:5',
            'images.*' => 'max:2048|image',
        ];
    }

    public function messages()
    {
        return [
            'city.exists' => 'The city has to be belong to the voivodship ',
            'images.max' => 'Coudnt add more than 5 images',
            'images.*.image' => 'FIle type has to be an image',
        ];
    }
}
