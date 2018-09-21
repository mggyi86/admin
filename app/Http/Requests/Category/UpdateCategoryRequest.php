<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories,name,' . $this->route('category')->id
        ];
    }

    public function updateCategory($category)
    {
        $category->name = $this->name;

        if($category->isDirty()) {
            $category->slug = str_slug($this->name);
            $category->save();
        }
    }
}
