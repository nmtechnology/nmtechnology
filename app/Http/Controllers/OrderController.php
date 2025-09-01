<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Submit a new order from the website.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submit(Request $request)
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'customer.firstName' => 'required|string|max:100',
                'customer.lastName' => 'required|string|max:100',
                'customer.email' => 'required|email|max:255',
                'customer.phone' => 'required|string|max:20',
                'items' => 'required|array|min:1',
                'items.*.id' => 'required',
                'items.*.name' => 'required|string',
                'items.*.quantity' => 'required|integer|min:1',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Log the order attempt
            Log::info('Attempting to process order from ' . $request->input('customer.email'));
            
            // Get all order data
            $orderData = $request->all();
            
            // Send email to service@nmtechnology.us
            Mail::to('service@nmtechnology.us')->send(new OrderMail($orderData));
            
            // Log success
            Log::info('Order email sent successfully');
            
            // Return success response
            return response()->json([
                'message' => 'Your order has been submitted successfully!',
            ], 200);
            
        } catch (\Exception $e) {
            // Log error
            Log::error('Order submission error: ' . $e->getMessage());
            
            // Return error response
            return response()->json([
                'message' => 'Error processing your order.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
