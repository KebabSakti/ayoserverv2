<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class UtilityController extends Controller
{
    public function phone($phone)
    {
        $user = \App\Models\Customer::where('customer_phone', $phone)->first();

        if(!$user) {
            return response()->json([
                'success' => false,
                'message' => 'No hp tidak terdaftar',
                'data' => null
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => null
        ]);
    }
}
