<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\BannerPrimary;
use App\Models\BannerSecondary;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Search;
use App\Models\ProductView;
use App\Models\RatingProduct;
use App\Models\ProductFavourite;
use App\Models\CartItem;
use App\Models\Bundle;
use App\Models\ProductBundle;
use Carbon\Carbon;

class MobilePageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function intro()
    {
        $cartItems = CartItem::with(['product' => function ($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'cart_items' => $cartItems,
                ]
            ]
        );
    }

    public function home()
    {
        $bannerPrimary = BannerPrimary::where('banner_primary_active', 1)->orderBy('created_at', 'desc')->get();
        $bannerSecondary = BannerSecondary::where('banner_secondary_active', 1)->orderBy('created_at', 'desc')->get();
        $category = Category::where('category_active', 1)->orderBy('category_order', 'asc')->get();
        $subCategory = SubCategory::where('sub_category_active', 1)->orderBy('sub_category_name', 'asc')->get();
        $voucher = Voucher::whereDate('voucher_end', '<', Carbon::now())->orderBy('created_at', 'desc')->get();
        $productPopular = Product::where('product_active', 1)->orderBy('product_search', 'desc')->limit(10)->get();
        $product = Product::where('product_active', 1)->inRandomOrder()->simplePaginate(10);
        $mostSearch = Search::select(DB::raw('*, count(*) as search_count'))
            ->groupBy('search_keyword')
            ->orderBy('search_count', 'desc')
            ->limit(10)
            ->get();

        $cartItems = CartItem::with(['product' => function ($q) {
            $q->where('product_active', 1);
        }])->where('customer_id', Auth::user()->customer_id)->get();

        foreach ($mostSearch as $item) {
            $item->search_image = Product::where('product_name', 'like', '%' . $item->search_keyword . '%')->first()->product_cover;
        }

        $bundles = Bundle::where('bundle_show', 1)
            ->where('bundle_active', 1)
            ->get();

        foreach ($bundles as $bundle) {
            $ids = ProductBundle::where('bundle_id', $bundle->bundle_id)->get()->map(function ($item, $key) {
                return $item->product_id;
            })->toArray();

            $bundle->products = Product::whereIn('product_id', $ids)->limit(10)->get();
        }

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'banner_primary' => $bannerPrimary,
                    'banner_secondary' => $bannerSecondary,
                    'category' => $category,
                    'sub_category' => $subCategory,
                    'voucher' => $voucher,
                    'product_popular' => $productPopular,
                    'product' => $product,
                    'most_search' => $mostSearch,
                    'cart_items' => $cartItems,
                    'bundles' => $bundles,
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

        foreach ($viewHistory as $item) {
            $item->search_image = Product::where('product_name', 'like', '%' . $item->search_keyword . '%')->first()->product_cover;
        }

        foreach ($popularSearch as $item) {
            $item->search_image = Product::where('product_name', 'like', '%' . $item->search_keyword . '%')->first()->product_cover;
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

    public function product($id)
    {
        $product = Product::where('product_id', $id)
            ->where('product_active', 1)
            ->first();

        $product->product_favourite = (ProductFavourite::where('customer_id', Auth::user()->customer_id)->where('product_id', $id)->first() != null) ? 1 : 0;

        $reviews = RatingProduct::join('customers', 'rating_products.customer_id', '=', 'customers.customer_id')
            ->select('rating_products.*', 'customers.customer_name')
            ->where('rating_products.product_id', $id)
            ->where('rating_products.customer_id', Auth::user()->customer_id)
            ->orderBy('rating_products.rating_product_value', 'desc')
            ->get();

        $relatedProducts = Product::where('product_active', 1)
            ->where('category_id', $product->category_id)
            ->orderBy('product_sold', 'desc')
            ->limit(10)
            ->get();

        $product->increment('product_view');

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => [
                    'product' => $product,
                    'reviews' => $reviews,
                    'related_products' => $relatedProducts,
                ]
            ]
        );
    }
}
