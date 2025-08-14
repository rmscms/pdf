<?php

namespace RMS\PDF;

class Invoice
{
    public $title;
    public $subtitle;
    public $invoice_number;
    public $invoice_date;
    public $reference;
    public $total_items;
    public $postage_cost;
    public $discount;
    public $discount_note;
    public $final_amount;
    public $products = [];
    public $footer_left;
    public $footer_right;

    public function __construct(array $data = [])
    {
        $this->title = $data['title'] ?? 'فاکتور فروش';
        $this->subtitle = $data['subtitle'] ?? 'صورتحساب رسمی';
        $this->invoice_number = $data['invoice_number'] ?? '';
        $this->invoice_date = $data['invoice_date'] ?? '';
        $this->reference = $data['reference'] ?? '';
        $this->total_items = $data['total_items'] ?? 0;
        $this->postage_cost = $data['postage_cost'] ?? 0;
        $this->discount = $data['discount'] ?? 0;
        $this->discount_note = $data['discount_note'] ?? '';
        $this->final_amount = $data['final_amount'] ?? ($this->total_items + $this->postage_cost - $this->discount);
        $this->footer_left = $data['footer_left'] ?? '';
        $this->footer_right = $data['footer_right'] ?? '';

        // تبدیل آرایه محصولات به اشیاء Product
        if (!empty($data['items'])) {
            foreach ($data['items'] as $item) {
                $this->products[] = new Product($item);
            }
        }
    }
}
