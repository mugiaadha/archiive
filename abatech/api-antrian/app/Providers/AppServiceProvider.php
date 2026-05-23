<?php

namespace App\Providers;

use Illuminate\Http\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('success', function ($data) {
            return response()->json([
                'response' => $data,
                'metadata' => [
                    "message" => "OK",
                    "code" => 200
                ]
            ]);
        });

        Response::macro('error', function ($message, $status,) {
            return response()->json([
                'metadata' => [
                    "message" => $message,
                    "code" => $status
                ]
            ]);
        });
    }
}
