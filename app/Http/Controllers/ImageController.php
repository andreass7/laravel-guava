<?php

namespace App\Http\Controllers;

use App\Models\Solution;
use App\Providers\AppModelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    public function predict(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $response = AppModelService::predict($image);

        if ($response->successful()) {
            $result = $response->json();
            $label = $result['prediction_label'];
            $solutionData = Solution::where('label', $label)->first();
            return view('result', [
                'prediction_label' => $label,
                'confidence'=>$result['confidence'],
                'solution' => $solutionData->solution ?? 'No solution found',
                'disease_name' => $solutionData->name ?? $label,
            ]);
        } else {
            \Illuminate\Support\Facades\Log::error("ML prediction failed", [
            'status' => $response->status(),
            'body' => $response->body()
            ]);
            return back()->withErrors(['msg' => 'Prediction failed']);
        }
    }
}
