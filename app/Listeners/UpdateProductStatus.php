<?php

namespace App\Listeners;

use App\Events\ProductUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateProductStatus
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
    public function handle(ProductUpdated $event): void
    {
        $product = $event->product;
        
        if ($product->quantity == 0) {
            $product->status = 'out of stock';
        } else {
            $product->status = 'active';
        }
        
        $product->save();

        // Ajoutez des journaux de débogage pour vérifier si la méthode est appelée
        logger('Product status updated: ' . $product->status);
    }
    
}
