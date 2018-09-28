<?php

namespace App\Http\Requests\Stock;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStockRequest extends FormRequest
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

    public function updateStock($stock)
    {
        $this->uploadStockImage($stock);

        $stock->name_en             = $this->name_en;
        $stock->name_mm             = $this->name_mm;
        $stock->restaurant_id       = $this->restaurant;
        $stock->uuid                = hexdec(uniqid());
        $stock->net_price           = $this->net_price;
        $stock->discounted_price    = $this->discounted_price;
        $stock->image               = $this->fileName;

        if($stock->isDirty()) {
            $stock->save();
        }
    }

    public function uploadStockImage($stock)
    {
        $uploadedImage = $this->image;
        $this->fileName = $stock->image;

        if($uploadedImage) {
            Storage::delete('public/stocks/' . $stock->image);
            $this->fileName = basename(Storage::putFile('public/stocks', new File($uploadedImage)));
        }

        return $this;
    }
}
