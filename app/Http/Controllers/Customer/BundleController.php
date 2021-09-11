<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bundle;

class BundleController extends Controller
{
    public function index(Request $request)
    {
        $query = Bundle::where('bundle_show', $request->bundle_show)
            ->where('bundle_active', 1)
            ->get();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $query,
            ]
        );
    }
}
