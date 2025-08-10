<?php

namespace RMS\PDF;

use Mpdf\Mpdf;

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
                'R' => 'Vazir.ttf', // فایل فونت معمولی
                'B' => 'Vazir-Bold.ttf', // فایل فونت بولد (اختیاری)
            ],
        ],
    ];

    public function __construct()
    {
        $this->config['fontDir'] = [public_path('vendor/rms-pdf/fonts')];
        $this->mpdf = new Mpdf($this->config);
    }

    public function setFont($font): self
    {
        $this->config['default_font'] = $font;
        $this->mpdf = new Mpdf($this->config);
        return $this;
    }

    public function setFormat($format): self
    {
        $this->config['format'] = $format;
        $this->mpdf = new Mpdf($this->config);
        return $this;
    }

    public function setOrientation($orientation): self
    {
        $this->config['orientation'] = $orientation;
        $this->mpdf = new Mpdf($this->config);
        return $this;
    }

    public function setMargins($left, $right, $top, $bottom): self
    {
        $this->config['margin_left'] = $left;
        $this->config['margin_right'] = $right;
        $this->config['margin_top'] = $top;
        $this->config['margin_bottom'] = $bottom;
        $this->mpdf = new Mpdf($this->config);
        return $this;
    }

    public function enableRTL(): self
    {
        $this->mpdf->SetDirectionality('rtl');
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
