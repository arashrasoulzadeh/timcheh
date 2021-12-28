<?php

namespace App\Providers;

use App\Services\Authenticators\SampleAuthenticationService;
use App\Services\CompressionService;
use App\Services\Compressors\ZipCompressorService;
use App\Services\Interfaces\AuthenticationServiceInterface;
use App\Services\Interfaces\CompressorServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind( CompressorServiceInterface::class, config( 'compression.service', ZipCompressorService::class ) );
        app()->bind( AuthenticationServiceInterface::class, config( 'auth.authenticator', SampleAuthenticationService::class ) );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
