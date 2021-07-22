<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\CartItem;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function cart(Request $request)
    {
        $cartItems = CartItem::with(['product' => function($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $cartItems,
            ]
        );
    }

    public function cartUpdate(Request $request)
    {
        if(!empty($request->cart_item)) {
            DB::transaction(function () use ($request) {
                CartItem::where('customer_id', Auth::user()->customer_id)->delete();
                
                foreach($request->cart_item as $item) {
                    CartItem::create([
                        'customer_id' => Auth::user()->customer_id,
                        'product_id' => $item['product_id'],
                        'cart_item_id' => Str::uuid(),
                        'cart_item_note' => $item['cart_item_note'] ?? null,
                        'cart_item_qty' => $item['cart_item_qty'],
                        'cart_item_price' => $item['cart_item_price'],
                    ]);
                }
            });
        }

        $cartItems = CartItem::with(['product' => function($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $cartItems,
            ]
        );
    }
}
