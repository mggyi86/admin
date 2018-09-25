<?php

namespace App\Http\Requests\Restaurant;

use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurantRequest extends FormRequest
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
            'merchant' => 'required|integer|exists:users,id',
            'name' => 'required|string|unique:restaurants,name',
            'contact_name' => 'nullable|string',
            'phone' => 'required|phone:MM',
            'email' => 'required|string|email|max:255|unique:restaurants,email',
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'service_charges' => 'nullable|string',
            'packagings' => 'nullable|string',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i|after:opening_time',
            'image' => 'image'
        ];
    }

    public function uploadRestaurantImage()
    {
        $uploadedImage = $this->image;

        if($uploadedImage) {
            $this->fileName = basename(Storage::putFile('public/restaurants', new File($uploadedImage)));
        }

        return $this;
    }

    public function storeRestaurant()
    {
        $user = User::findOrFail($this->merchant);

        $user->restaurants()->create([
            'name'                 => $this->name,
            'slug'                 => str_slug($this->name),
            'contact_name'         => $this->contact_name,
            'phone'                => $this->phone,
            'email'                => $this->email,
            'address'              => $this->address,
            'description'          => $this->description,
            'service_charges(%)'   => $this->service_charges,
            'packagings(per item)' => $this->packagings,
            'opening_time'         => $this->opening_time,
            'closing_time'         => $this->closing_time,
            'image'                => $this->fileName
        ]);
    }
}
