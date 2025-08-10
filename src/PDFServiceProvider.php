<?php

namespace RMS\PDF;

use Illuminate\Support\ServiceProvider;
use Mpdf\Mpdf;

class PDFServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('pdf', function () {
            $config = [
                'mode' => 'utf-8',
                'format' => 'A4',
                'default_font' => 'vazir',
                'orientation' => 'P',
                'margin_left' => 10,
                'margin_right' => 10,
                'margin_top' => 10,
                'margin_bottom' => 10,
            ];

            return new Mpdf($config);
        });
    }

    public function boot()
    {

        $this->publishes([
            __DIR__ . '/../fonts' => public_path('vendor/rms-pdf/fonts'),
        ], 'rms-pdf-fonts');
    }
}
