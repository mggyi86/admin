<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
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
        return [
            'division' => 'required|integer|exists:divisions,id',
            'name' => 'required|string|unique:townships,name,' . $this->route('township')->id
        ];
    }

    public function updateTownship($township)
    {
        $township->name        = $this->name;
        $township->division_id = $this->division;

        if($township->isDirty()) {
            $township->slug = str_slug($this->name);
            $township->save();
        }
    }
}
