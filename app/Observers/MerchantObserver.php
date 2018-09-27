<?php

namespace App\Observers;

use App\Models\Merchant;
use Illuminate\Support\Facades\Log;

class MerchantObserver
{
    /**
     * Handle the merchant "created" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function created(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "updated" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function updated(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "deleted" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function deleted(Merchant $merchant)
    {
        Log::info('success');
        $merchant->restaurants()->delete();
    }

    /**
     * Handle the merchant "restored" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function restored(Merchant $merchant)
    {
        //
    }

    /**
     * Handle the merchant "force deleted" event.
     *
     * @param  \App\Merchant  $merchant
     * @return void
     */
    public function forceDeleted(Merchant $merchant)
    {
        //
    }
}
