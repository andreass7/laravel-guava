<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function predict(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $response = Http::attach(
            'file',
            file_get_contents($image),
            $image->getClientOriginalName()
        )->post('http://127.0.0.1:8000/predict');
        if ($response->successful()) {
            $result = $response->json();
            return view('result', [
                'prediction_label' => $result['prediction_label'],
                'confidence'=>$result['confidence']
            ]);
        } else {
            return back()->withErrors(['msg' => 'Prediction failed']);
        }
    }
}
