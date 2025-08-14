<?php

namespace RMS\PDF;

class Buyer
{
    public $name;
    public $address;
    public $postal_code;
    public $phone;

    public function __construct(array $data = [])
    {
        $this->name = $data['name'] ?? '';
        $this->address = $data['address'] ?? '';
        $this->postal_code = $data['postal_code'] ?? '';
        $this->phone = $data['phone'] ?? '';
    }
}
