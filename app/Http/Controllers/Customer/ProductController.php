<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\Product;
use App\Models\ProductFavourite;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function product(Request $request)
    {
        $query = Product::where('product_active', 1);

        //=======================================================FILTER START
        if(!empty($request->delivery_type)) {
            $query->where('product_delivery_type', $request->delivery_type);
        }

        if(!empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        if(!empty($request->sub_category)) {
            $query->where('sub_category_id', $request->sub_category);
        }

        if(!empty($request->product_id)) {
            $query->where('product_id', $request->product_id);
        }

        if(!empty($request->keyword)) {
            $query->where('product_name', 'like', '%'.$request->keyword.'%');
        }

        if(!empty($request->high_rating_value)) {
            $query->where('product_rating_value', '>=', 4.0)
                  ->reorder('product_rating_value', 'desc');
        }

        if(!empty($request->discount)) {
            $query->where('product_discount', '>', 0)
                  ->reorder('product_discount', 'desc');
        }

        if(!empty($request->high_point)) {
            $query->where('product_point', '>', 0)
                  ->reorder('product_point', 'desc');
        }

        if(!empty($request->high_view)) {
            $query->where('product_view', '>', 0)
                  ->reorder('product_view', 'desc');
        }

        if(!empty($request->high_sell)) {
            $query->where('product_sold', '>', 0)
                  ->reorder('product_sold', 'desc');
        }

        if(!empty($request->hight_rating_count)) {
            $query->where('product_rating_count', '>', 0)
                  ->reorder('product_rating_count', 'desc');
        }

        if(!empty($request->high_search)) {
            $query->where('product_search', '>', 0)
                  ->reorder('product_search', 'desc');
        }
        //=======================================================FILTER END

        //=======================================================SORTING START
        if(!empty($request->product_price)) {
            $query->reorder('product_final_price', $request->product_price);
        }
        //=======================================================SORTING END

        $product = $query->simplePaginate(10);

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $product,
            ]
        );
    }

    public function productTotal(Request $request)
    {
        $query = Product::where('product_active', 1);

        //=======================================================FILTER START
        if(!empty($request->delivery_type)) {
            $query->where('product_delivery_type', $request->delivery_type);
        }

        if(!empty($request->category)) {
            $query->where('category_id', $request->category);
        }

        if(!empty($request->sub_category)) {
            $query->where('sub_category_id', $request->sub_category);
        }

        if(!empty($request->product_id)) {
            $query->where('product_id', $request->product_id);
        }

        if(!empty($request->keyword)) {
            $query->where('product_name', 'like', '%'.$request->keyword.'%');
        }

        if(!empty($request->high_rating_value)) {
            $query->where('product_rating_value', '>=', 4.0);
        }

        if(!empty($request->discount)) {
            $query->where('product_discount', '>', 0);
        }

        if(!empty($request->high_point)) {
            $query->where('product_point', '>', 0);
        }

        if(!empty($request->high_view)) {
            $query->where('product_view', '>', 0);
        }

        if(!empty($request->high_sell)) {
            $query->where('product_sold', '>', 0);
        }

        if(!empty($request->hight_rating_count)) {
            $query->where('product_rating_count', '>', 0);
        }

        if(!empty($request->high_search)) {
            $query->where('product_search', '>', 0);
        }
        //=======================================================FILTER END

        //=======================================================SORTING START
        if(!empty($request->product_price)) {
            $query->reorder('product_final_price', $request->product_price);
        }
        //=======================================================SORTING END

        $product = $query->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $product,
            ]
        );
    }

    public function productFavourite(Request $request)
    {
        $favourite = ProductFavourite::where('customer_id', Auth::user()->customer_id)
                                     ->where('product_id', $request->product_id)
                                     ->first();

        $product = Product::where('product_id', $request->product_id)->first();
        
        if(empty($favourite)) {
            //insert
            ProductFavourite::create([
                'customer_id' => Auth::user()->customer_id,
                'product_id' => $request->product_id,
                'product_favourites_id' => Str::uuid()
            ]);

            $product->product_favourite = 1;

        }else{
            //delete
            $favourite->delete();

            $product->product_favourite = 0;
        }

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $product,
            ]
        );
    }
}
