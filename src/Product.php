<?php

namespace RMS\PDF;

class Product
{
    public $description;
    public $quantity;
    public $unit_price;
    public $total;

    public function __construct(array $data = [])
    {
        $this->description = $data['description'] ?? '';
        $this->quantity = $data['quantity'] ?? 0;
        $this->unit_price = $data['unit_price'] ?? 0;
        $this->total = $data['total'] ?? ($this->quantity * $this->unit_price);
    }
}
