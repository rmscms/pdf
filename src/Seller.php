<?php

namespace RMS\PDF;

class Seller
{
    public $company;
    public $address;
    public $postal_code;
    public $phone;
    public $bank;

    public function __construct(array $data = [])
    {
        $this->company = $data['company'] ?? '';
        $this->address = $data['address'] ?? '';
        $this->postal_code = $data['postal_code'] ?? '';
        $this->phone = $data['phone'] ?? '';
        $this->bank = new Bank($data['bank'] ?? []);
    }
}
