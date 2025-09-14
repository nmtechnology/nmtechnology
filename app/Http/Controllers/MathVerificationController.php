<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathVerificationController extends Controller
{
    public function verify(Request $request)
    {
        $userAnswer = $request->input('userAnswer');
        $correctAnswer = $request->input('correctAnswer');
        if ((int)$userAnswer === (int)$correctAnswer) {
            session(['math_verified' => true, 'math_status' => 'success']);
            return response()->json(['status' => 'success']);
        } else {
            session(['math_status' => 'failure']);
            return response()->json(['status' => 'failure']);
        }
    }
}
