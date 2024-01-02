<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductQuantityListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductPurchased $event): void
    {
        // $product = $event->product;

        // // Update the product quantity (example: reduce by 1)
        // $product->quantity -= 1;
        // $product->save();

        $product=$event->product;

        foreach(json_decode($product->items) as $item){
            Product::find($item->id)->decrement('quantity',$item->quantity);
        }
    }
}
