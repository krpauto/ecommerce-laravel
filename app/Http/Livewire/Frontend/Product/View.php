<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class View extends Component
{
    public $product, $category, $quantityCount = 1;

    public function addToWishlist($productId)
    {
        if (Auth::check()) {

            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {

                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Already added to wishlist',
                    'type' => 'warning'
                ]);
                return false;
            } else {
                Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ]);

                $this->emit('wishlistAddedUpdated');

                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Wishlist Added to wishlist',
                    'type' => 'success'
                ]);
            }
        } else {

            $this->dispatchBrowserEvent('wishlist-updated', [
                'message' => 'Please login to continue',
                'type' => 'error'
            ]);
            return false;
        }
    }

    public function incrementQuantity()
    {
        if ($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    public function decrementQuantity()
    {
        if ($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    // public function addToCart(int $productId)
    // {
    //     if (Auth::check()) {
    //         // dd($productId);
    //         if ($this->product->where('id', $productId)->where('status', '0')->exists()) {

    //             if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
    //                 $this->dispatchBrowserEvent('wishlist-updated', [
    //                     'message' => 'Product already in cart',
    //                     'type' => 'warning'
    //                 ]);

    //             } else {

    //             if ($this->product->quantity > 0) {

    //                 if ($this->product->quantity > $this->quantityCount) {
    //                     // Insert Product to Cart
    //                     Cart::create([
    //                         'user_id' => auth()->user()->id,
    //                         'product_id' => $productId,
    //                         'quantity'   => $this->quantityCount
    //                     ]);

    //                     $this->dispatchBrowserEvent('wishlist-updated', [
    //                         'message' => 'Product Added to cart',
    //                         'type' => 'success'
    //                     ]);
    //                 } else {
    //                     $this->dispatchBrowserEvent('wishlist-updated', [
    //                         'message' => 'Product ' . $this->product->quantity . 'Quantity Available',
    //                         'type' => 'warning'
    //                     ]);
    //                 }
    //             } else {
    //                 $this->dispatchBrowserEvent('wishlist-updated', [
    //                     'message' => 'Product out of stock',
    //                     'type' => 'warning'
    //                 ]);
    //             }
    //         } else {
    //             $this->dispatchBrowserEvent('wishlist-updated', [
    //                 'message' => 'Product does not exists',
    //                 'type' => 'warning'
    //             ]);
    //         }
    //     }
    //     } else {
    //         $this->dispatchBrowserEvent('wishlist-updated', [
    //             'message' => 'Please login to add to cart',
    //             'type' => 'warning'
    //         ]);
    //     }
    // }

    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            // dd($productId);
            $product = $this->product->where('id', $productId)->where('status', '0')->first();

            if ($product) {
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()) {
                    $this->dispatchBrowserEvent('wishlist-updated', [
                        'message' => 'Product already in cart',
                        'type' => 'warning'
                    ]);
                } else {
                    if ($product->quantity > 0) {
                        if ($product->quantity > $this->quantityCount) {
                            // Insert Product to Cart
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);

                            $this->emit('CartAddedUpdated');
                            $this->dispatchBrowserEvent('wishlist-updated', [
                                'message' => 'Product added to cart',
                                'type' => 'success'
                            ]);
                        } else {
                            $this->dispatchBrowserEvent('wishlist-updated', [
                                'message' => 'Only ' . $product->quantity . ' quantity available',
                                'type' => 'warning'
                            ]);
                        }
                    } else {
                        $this->dispatchBrowserEvent('wishlist-updated', [
                            'message' => 'Product out of stock',
                            'type' => 'warning'
                        ]);
                    }
                }
            } else {
                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Product does not exist',
                    'type' => 'warning'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('wishlist-updated', [
                'message' => 'Please login to add to cart',
                'type' => 'warning'
            ]);
        }
    }


    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view', [
            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
