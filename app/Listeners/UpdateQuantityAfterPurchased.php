<?php

namespace App\Listeners;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateQuantityAfterPurchased
{

    /**
     * Handle the event.
     */
    // public function handle($event): void
    // {
    //     $product=$event->product;

    //     foreach(json_decode($product->items) as $item){
    //         Product::find($item->id)->decrement('quantity',$item->quantity);
    //     }
    // }
}
