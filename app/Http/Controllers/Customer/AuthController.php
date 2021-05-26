<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'customer_id' => 'required|unique:customers',
            ]);

            if($validator->fails()) {
                DB::rollBack();

                return response()->json(
                    [
                        'success' => false,
                        'message' => $validator->errors()->first(),
                        'data' => null,
                    ]
                );
            }

            $user = Customer::create([
                'customer_id' => $request->customer_id,
                'customer_phone' => $request->customer_phone,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_password' => Hash::make($request->customer_password),
                'customer_fcm' => $request->customer_fcm,
            ]);

            $token = $user->createToken($request->customer_id)->plainTextToken;

            $user->token = $token;

            DB::commit();
        
            return response()->json(
                [
                    'success' => true,
                    'message' => '',
                    'data' => $user
                ]
            );
    }

    public function user(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
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

        $user = Customer::where('customer_id', $request->customer_id)->first();

        if (empty($user)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User tidak ditemukan',
                    'data' => null,
                ]
            );
        }

        $token = $user->createToken($request->customer_id)->plainTextToken;

        $user->token = $token;

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $user,
            ]
        );
    }

    public function revoke(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => 'required',
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

        $user = Customer::where('customer_id', $request->customer_id)->first();

        $user->tokens()->delete();

        return response()->json(
            [
                'success' => true,
                'message' => 'Anda berhasil logout',
                'data' => null,
            ]
        );
    }
}
