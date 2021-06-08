<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Search;
use App\Models\Product;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function search(Request $request)
    {
        $keywords = Search::select(DB::raw('*, count(*) as search_count'))
                          ->where('search_keyword', 'like', '%'.$request->keyword.'%')
                          ->groupBy('search_keyword')
                          ->orderBy('search_count', 'desc')
                          ->orderBy('id', 'desc')
                          ->limit(5)
                          ->get();

        $products = Product::where('product_name', 'like', '%'.$request->keyword.'%')
                           ->limit(5)
                           ->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'keywords' => $keywords,
                    'products' => $products, 
                ],
            ]
        );
    }
}
