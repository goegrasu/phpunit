<?php

class OrderTwo
{

    public $quantity;

    public $unit_price;

    public $amount = 0;

    public function __construct(int $quantity, float $unit_price)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;

        $this->amount = $quantity * $unit_price;
    }

    public function process(PaymentGateway $gateway)
    {
        return $gateway->charge($this->amount);
    }
}
