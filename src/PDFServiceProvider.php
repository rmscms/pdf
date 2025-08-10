<?php

namespace RMS\PDF;

use Illuminate\Support\ServiceProvider;

class PDFServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('pdf', function () {
            return new PDF();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../fonts' => public_path('vendor/rms-pdf/fonts'),
        ], 'rms-pdf-fonts');


        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/rms-pdf'),
        ], 'rms-pdf-views');
    }
}
