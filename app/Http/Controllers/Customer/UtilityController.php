<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UtilityController extends Controller
{
    public function exist(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'unique:customers',
            'customer_phone' => 'unique:customers',
            'customer_email' => 'unique:customers',
        ]);

        if($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->first(),
                    'data' => null,
                ]
            );
        }

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => null
        ]);
    }
}
