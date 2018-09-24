<?php

namespace App\Http\Requests\Merchant;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class CreateMerchantRequest extends FormRequest
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|phone:MM',
            'address' => 'nullable|string'
        ];
    }

    public function storeMerchant()
    {
        $merchant = User::create([
                    'name'              => $this->name,
                    'slug'              => str_slug($this->name),
                    'email'             => $this->email,
                    'email_verified_at' => Carbon::now(),
                    'password'          => Hash::make($this->password),
                    'phone'             => $this->phone,
                    'address'           => $this->address
                ]);
        $merchant->assignRole('merchant');
    }
}
