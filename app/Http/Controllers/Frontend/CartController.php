<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = auth()->user();

        $cartItems = Cart::where('user_id', $user->id)
            ->with('product') // Use 'products' instead of 'product'
            ->get(); // Get the cart for this user

        return view('user.cart', compact('user', 'cartItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $user = auth()->user();

        $request->validate([
            'id' => 'required|integer|exists:products,id', // Ensure product exists
            'quantity' => 'required|integer|min:1', // Ensure quantity is a positive integer
        ]);

        $cartItem = Cart::where('user_id', $user->id)
            ->where('product_id', $request->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity; // Increment quantity
            $cartItem->save(); // Save changes

            return response()->json(['success' => true, 'message' => "Quantity updated in cart."], 200);
        } else {
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->id,
                'quantity' => $request->quantity,
            ]);

            return response()->json(['success' => true, 'message' => "Product added to cart."], 201);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Cart::destroy($id)){
            return redirect()->route('cart.index')->with('success', 'Item deleted successfully');
        }else{
            return redirect()->route('cart.index')->with('error', 'Item deleted successfully');

        }
    }

    /*
     * Remove all items from cart
     */
    public function clear()
    {

    }

    public function getCart()
    {
        $user = auth()->user();
        $allItems = Cart::where('user_id', $user->id)->get();
        return json_encode($allItems);
    }
}
