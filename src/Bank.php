<?php

namespace RMS\PDF;

class Bank
{
    public $account_holder;
    public $card_number;
    public $sheba;

    public function __construct(array $data = [])
    {
        $this->account_holder = $data['account_holder'] ?? '';
        $this->card_number = $data['card_number'] ?? '';
        $this->sheba = $data['sheba'] ?? '';
    }
}
