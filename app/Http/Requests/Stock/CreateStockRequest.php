<?php

namespace App\Http\Requests\Stock;

use Illuminate\Http\File;
use App\Models\Restaurant;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class CreateStockRequest extends FormRequest
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
            'restaurant' => 'required|integer|exists:restaurants,id',
            'name_en' => 'required|string',
            'name_mm' => 'nullable|string',
            'net_price' => 'required|integer',
            'discounted_price' => 'required|integer',
            'image' => 'image'
        ];
    }

    public function storeStock()
    {
        $restaurant = Restaurant::findOrFail($this->restaurant);

        $this->uploadStockImage();

        $restaurant->stocks()->create([
            'name_en'              => $this->name_en,
            'name_mm'              => $this->name_mm,
            'uuid'                 => hexdec(uniqid()),
            'net_price'            => $this->net_price,
            'discounted_price'     => $this->discounted_price,
            'image'                => $this->fileName
        ]);
    }

    public function uploadStockImage()
    {
        $uploadedImage = $this->image;

        if($uploadedImage) {
            $this->fileName = basename(Storage::putFile('public/stocks', new File($uploadedImage)));
        }

        return $this;
    }
}
