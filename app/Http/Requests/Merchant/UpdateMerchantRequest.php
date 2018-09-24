<?php

namespace App\Http\Requests\Merchant;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMerchantRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('merchant')->id ,
            // 'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|phone:MM',
            'address' => 'nullable|string'
        ];
    }

    public function updateMerchant($merchant)
    {
        $merchant->name     = $this->name;
        $merchant->email    = $this->email;
        // $merchant->password = Hash::make($this->password);
        $merchant->phone    = $this->phone;
        $merchant->address  = $this->address;

        if($merchant->isDirty()) {
            $merchant->slug = str_slug($this->name);
            $merchant->save();
        }
    }
}
