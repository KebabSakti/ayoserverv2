<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BannerPrimary;
use App\Models\Category;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Search;
use App\Models\ProductView;
use Carbon\Carbon;

class MobilePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    
    public function home()
    {
        $bannerPrimary = BannerPrimary::where('banner_primary_active', 1)->orderBy('created_at', 'desc')->get();
        $category = Category::where('category_active', 1)->orderBy('category_name', 'asc')->get();
        $voucher = Voucher::whereDate('voucher_end', '<', Carbon::now())->orderBy('created_at', 'desc')->get();
        $productPopular = Product::where('product_active', 1)->orderBy('product_search', 'desc')->limit(10)->get();
        $product = Product::where('product_active', 1)->inRandomOrder()->simplePaginate(10);
        $mostSearch = Search::select(DB::raw('*, count(*) as search_count'))
                            ->groupBy('search_keyword')
                            ->orderBy('search_count', 'desc')
                            ->limit(10)
                            ->get();

        foreach($mostSearch as $item) {
            $item->search_image = Product::where('product_name', 'like', '%'.$item->search_keyword.'%')->first()->product_cover;
        }

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'banner_primary' => $bannerPrimary,
                    'category' => $category,
                    'voucher' => $voucher,
                    'product_popular' => $productPopular,
                    'product' => $product,
                    'most_search' => $mostSearch,
                ]
            ]
        );
    }

    public function search()
    {
        $viewHistory = ProductView::join('products', 'product_views.product_id', '=', 'products.product_id')
                                  ->select('product_views.*', 'products.product_cover')
                                  ->orderBy('product_views.updated_at', 'desc')
                                  ->orderBy('product_views.id', 'desc')
                                  ->limit(5)
                                  ->get();

        $searchHistory = Search::where('customer_id', Auth::user()->customer_id)
                               ->groupBy('search_keyword')
                               ->orderBy('updated_at', 'desc')
                               ->orderBy('id', 'desc')
                               ->limit(5)
                               ->get();

        $popularSearch = Search::select(DB::raw('*, count(*) as search_count'))
                              ->groupBy('search_keyword')
                              ->orderBy('search_count', 'desc')
                              ->orderBy('id', 'desc')
                              ->limit(5)
                              ->get();

        foreach($viewHistory as $item) {
            $item->search_image = Product::where('product_name', 'like', '%'.$item->search_keyword.'%')->first()->product_cover;
        }

        foreach($popularSearch as $item) {
            $item->search_image = Product::where('product_name', 'like', '%'.$item->search_keyword.'%')->first()->product_cover;
        }

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'view_history' => $viewHistory,
                    'search_history' => $searchHistory,
                    'popular_search' => $popularSearch,
                ]
            ]
        );
    }
}
