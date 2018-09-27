<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
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
            'merchant' => 'required|integer|exists:users,id',
            'name' => 'required|string|unique:restaurants,name,' . $this->route('restaurant')->id,
            'contact_name' => 'nullable|string',
            'phone' => 'required|phone:MM',
            'email' => 'required|string|email|max:255|unique:restaurants,email,' . $this->route('restaurant')->id,
            'address' => 'nullable|string',
            'description' => 'nullable|string',
            'service_charges' => 'nullable|string',
            'packagings' => 'nullable|string',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i|after:opening_time',
            'image' => 'image',
        ];
    }

    public function updateRestaurant($restaurant)
    {
        $this->uploadRestaurantImage($restaurant);

        $restaurant->name                     = $this->name;
        $restaurant->merchant_id              = $this->merchant;
        $restaurant->name                     = $this->name;
        $restaurant->contact_name             = $this->contact_name;
        $restaurant->phone                    = $this->phone;
        $restaurant->email                    = $this->email;
        $restaurant->address                  = $this->address;
        $restaurant->description              = $this->description;
        $restaurant->{'service_charges(%)'}   = $this->service_charges;
        $restaurant->{'packagings(per item)'} = $this->packagings;
        $restaurant->opening_time             = $this->opening_time;
        $restaurant->closing_time             = $this->closing_time;
        $restaurant->image                    = $this->fileName;

        if($restaurant->isDirty()) {
            $restaurant->slug = str_slug($this->name);
            $restaurant->save();
        }
    }

    public function uploadRestaurantImage($restaurant)
    {
        $uploadedImage = $this->image;
        $this->fileName = $restaurant->image;

        if($uploadedImage) {
            Storage::delete('public/restaurants/' . $restaurant->image);
            $this->fileName = basename(Storage::putFile('public/restaurants', new File($uploadedImage)));
        }

        return $this;
    }
}
