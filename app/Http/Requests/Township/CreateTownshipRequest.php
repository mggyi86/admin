<?php

namespace App\Http\Requests\Township;

use App\Models\Division;
use Illuminate\Foundation\Http\FormRequest;

class CreateTownshipRequest extends FormRequest
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
            'name' => 'required|string|unique:townships,name'
        ];
    }

    public function storeTownship()
    {
        $division = Division::findOrFail($this->division);

        $division->townships()->create([
            'name' => $this->name,
            'slug' => str_slug($this->name)
        ]);
    }
}
