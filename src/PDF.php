<?php

namespace RMS\PDF;

use Mpdf\Mpdf;
use Illuminate\Support\Facades\View;

class PDF
{
    protected $mpdf;
    protected $config = [
        'mode' => 'utf-8',
        'format' => 'A4',
        'default_font' => 'vazir',
        'orientation' => 'P',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 10,
        'margin_bottom' => 10,
        'fontdata' => [
            'vazir' => [
                'R' => 'Vazir.ttf',
                'B' => 'Vazir-Bold.ttf',
                'useOTL' => 0xFF, // فعال کردن OpenType Layout
                'useKashida' => 75, // تنظیم کشیدگی برای متون فارسی
            ],
        ],
    ];

    public function __construct()
    {
        $this->config['fontDir'] = [public_path('vendor/rms-pdf/fonts')];
        $this->mpdf = new Mpdf($this->config);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
    }

    public function loadTheme($theme, $data = []): self
    {
        $viewPath = 'vendor.rms-pdf.' . str_replace('/', '.', $theme);
        if (View::exists($viewPath)) {
            $html = View::make($viewPath, $data)->render();
        } else {
            $html = is_file($theme) ? file_get_contents($theme) : $theme;
        }
        $this->mpdf->WriteHTML($html);
        return $this;
    }

    public function setFont($font): self
    {
        $this->config['default_font'] = $font;
        $this->mpdf = new Mpdf($this->config);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
        return $this;
    }

    public function setFormat($format): self
    {
        $this->config['format'] = $format;
        $this->mpdf = new Mpdf($this->config);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
        return $this;
    }

    public function setOrientation($orientation): self
    {
        $this->config['orientation'] = $orientation;
        $this->mpdf = new Mpdf($this->config);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
        return $this;
    }

    public function setMargins($left, $right, $top, $bottom): self
    {
        $this->config['margin_left'] = $left;
        $this->config['margin_right'] = $right;
        $this->config['margin_top'] = $top;
        $this->config['margin_bottom'] = $bottom;
        $this->mpdf = new Mpdf($this->config);
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
        return $this;
    }

    public function enableRTL(): self
    {
        $this->mpdf->SetDirectionality('rtl');
        $this->mpdf->autoScriptToLang = true;
        $this->mpdf->baseScript = 1;
        $this->mpdf->autoLangToFont = true;
        $this->mpdf->useAdobeCJK = false;
        return $this;
    }

    public function loadHTML($html): self
    {
        $this->mpdf->WriteHTML($html);
        return $this;
    }

    public function save($filename): self
    {
        $this->mpdf->Output($filename, 'F');
        return $this;
    }

    public function stream($filename = 'document.pdf'): self
    {
        $this->mpdf->Output($filename, 'I');
        return $this;
    }

    public function download($filename = 'document.pdf'): self
    {
        $this->mpdf->Output($filename, 'D');
        return $this;
    }

    public function getMpdf(): Mpdf
    {
        return $this->mpdf;
    }
}
