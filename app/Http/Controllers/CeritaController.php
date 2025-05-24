<?php

namespace App\Http\Controllers;

use App\Models\Cerita;
use Illuminate\Http\Request;

class CeritaController extends Controller
{
    public function index()
    {
        $ceritas = Cerita::select('id','tema', 'cerita', 'makna')->get();

        return response()->json($ceritas);
    }
}
