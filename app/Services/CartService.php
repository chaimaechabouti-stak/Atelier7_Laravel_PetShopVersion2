<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected const CART_KEY = 'shopping_cart';

    public function add(Product $product, int $quantity = 1): void
    {
        $cart = $this->getCart();
        
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'slug' => $product->slug,
                'price' => $product->price,
                'image' => $product->main_image,
                'quantity' => $quantity,
                'weight' => $product->weight,
                'brand' => $product->brand,
            ];
        }
        
        $this->saveCart($cart);
    }

    public function update(int $productId, int $quantity): void
    {
        $cart = $this->getCart();
        
        if (isset($cart[$productId])) {
            if ($quantity <= 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['quantity'] = $quantity;
            }
            
            $this->saveCart($cart);
        }
    }

    public function remove(int $productId): void
    {
        $cart = $this->getCart();
        unset($cart[$productId]);
        $this->saveCart($cart);
    }

    public function clear(): void
    {
        Session::forget(self::CART_KEY);
    }

    public function getCart(): array
    {
        return Session::get(self::CART_KEY, []);
    }

    public function getTotalItems(): int
    {
        return array_sum(array_column($this->getCart(), 'quantity'));
    }

    public function getSubtotal(): float
    {
        $total = 0;
        
        foreach ($this->getCart() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return $total;
    }

    public function getShippingCost(): float
    {
        $subtotal = $this->getSubtotal();
        
        if ($subtotal >= 50) {
            return 0; // Livraison gratuite à partir de 50€
        }
        
        return 4.90; // Frais de livraison standard
    }

    public function getTotal(): float
    {
        return $this->getSubtotal() + $this->getShippingCost();
    }

    protected function saveCart(array $cart): void
    {
        Session::put(self::CART_KEY, $cart);
    }
}