<?php

namespace Tests\Feature;

use App\Events\OrderReceivedEvent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {

        $this->postJson('/api/orders',[
            "total_price"=> "2890.00",
            "created_by"=> 2,
            "updated_by"=> 2,
            "order_status_id"=> 1,
            "delivery_information"=> [
                "customer_name"=> "Customer",
                "mobile_number"=> "01704222222",
                "email"=> "Customer@email.com",
                "address"=> "Customer Address",
                "city"=> "Customer City",
                "post_code"=> "Customer Post Code",
                "country"=> "Customer Country"
            ],
            "order_items"=> [
                [
                    "product_code"=> "3206179651",
                    "product_name"=> "accusamus id iusto",
                    "brand"=> "nostrum sit impedit",
                    "qty"=> 2,
                    "unit_price"=> "949.00",
                    "product_unit"=> "Box"
                ],
                [
                    "product_code"=> "9352702881",
                    "product_name"=> "ad fuga delectus",
                    "brand"=> "provident aspernatur ipsam",
                    "qty"=> 5,
                    "unit_price"=> "992.00",
                    "product_unit"=> "Bottle"
                ]
            ]
        ]
        );
        Event::assertDispatched(OrderReceivedEvent::class);
    }
}
