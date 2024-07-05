<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Quantity Updated',
                    'type' => 'success'
                ]);
            } else {
                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Only ' . $cartData->product->quantity . ' quantity available',
                    'type' => 'error'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('wishlist-updated', [
                'message' => 'Something went wrong',
                'type' => 'error'
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            if ($cartData->product->quantity > $cartData->quantity) {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Quantity Updated',
                    'type' => 'success'
                ]);
            } else {
                $this->dispatchBrowserEvent('wishlist-updated', [
                    'message' => 'Only ' . $cartData->product->quantity . ' quantity available',
                    'type' => 'error'
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('wishlist-updated', [
                'message' => 'Something went wrong',
                'type' => 'error'
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            'cart' => $this->cart
        ]);
    }
}