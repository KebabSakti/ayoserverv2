<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PaymentChannel;

class PaymentChannelController extends Controller
{
    public function paymentChannel()
    {
        $paymentChannel = PaymentChannel::all();

        return response()->json(
            [
                'success' => true,
                'message' => '',
                'data' => $paymentChannel,
            ]
        );
    }
}
