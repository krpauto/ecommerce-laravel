<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;

class View extends Component
{
    public $product, $category;

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