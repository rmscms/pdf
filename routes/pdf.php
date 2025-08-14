<?php

use Illuminate\Support\Facades\Route;
use RMS\PDF\Http\Controllers\PdfController;

Route::get('/rms-pdf-test', [PdfController::class, 'generate']);
