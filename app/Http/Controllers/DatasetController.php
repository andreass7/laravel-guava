<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    public function index()
    {
        $datasets = Dataset::select('filename', 'cerita_id')->get();

        $datasets->transform(function ($item) {
            $item->image_url = asset('data/' . $item->filename);
            return $item;
        });

        return response()->json($datasets);
    }
}
