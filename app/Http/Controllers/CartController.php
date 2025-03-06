<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Show cart items
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    // Add item to cart
    public function add(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));

        return redirect()->route('cart')->with('success', 'Product added to cart!');
    }

    // Remove item from cart
    public function remove(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);
        session()->put('cart_count', count($cart));

        return redirect()->route('cart')->with('success', 'Product removed from cart!');
    }

    // Clear the entire cart
    public function clear()
    {
        session()->forget('cart');
        session()->forget('cart_count');

        return redirect()->route('cart')->with('success', 'Cart cleared!');
    }
}
