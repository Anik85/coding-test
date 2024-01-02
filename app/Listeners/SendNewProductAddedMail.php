<?php

namespace App\Listeners;

use App\Events\ProductPurchased;
use App\Mail\WelcomeMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewProductAddedMail
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
        //
        Mail::to($event->product->email)->send(new WelcomeMail($event->product->name));
    }
}
