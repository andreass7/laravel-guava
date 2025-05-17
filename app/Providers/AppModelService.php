<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class AppModelService extends ServiceProvider
{
    public static function predict($image)
    {
        return Http::timeout(30)
            ->retry(2, 2000)
            ->attach('file', file_get_contents($image), 
            $image->getClientOriginalName())
            ->post(env('MODEL_API_URL'));
    }
}
