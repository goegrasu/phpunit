<?php

use PHPUnit\Framework\TestCase;

class OrderTwoTest extends TestCase
{
    protected function tearDown(): void
    {
        \Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {

        $order = new OrderTwo(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        $gateway_mock = Mockery::mock('PaymentGateway');

        $gateway_mock->shouldReceive('charge')
            ->once()
            ->with(5.97);

        $order->process($gateway_mock);
    }

    public function testOrderIsProcessedUsingASpy()
    {
        $order = new OrderTwo(3, 1.99);

        $this->assertEquals(5.97, $order->amount);

        // with a spy you cannot specify a return value for the stub
        $gateway_spy = Mockery::spy('PaymentGateway');

        $order->process($gateway_spy);

        $gateway_spy->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);
    }
}
