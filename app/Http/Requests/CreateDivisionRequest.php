<?php

namespace App\Http\Requests;

use App\Models\Division;
use Illuminate\Foundation\Http\FormRequest;

class CreateDivisionRequest extends FormRequest
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
            'name' => 'required|string|unique:divisions,name'
        ];
    }

    public function storeDivision()
    {
        Division::create([
            'name' => $this->name,
            'slug' => str_slug($this->name)
        ]);
    }
}
