<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeder for Order
        $orders = [
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-01-01')),
                'invoice'           => 'INV-000001',
                'delivery_number'   => '0001',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-02-01')),
                'invoice'           => 'INV-000002',
                'delivery_number'   => '0002',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-03-01')),
                'invoice'           => 'INV-000003',
                'delivery_number'   => '0003',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-04-01')),
                'invoice'           => 'INV-000004',
                'delivery_number'   => '0004',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-05-01')),
                'invoice'           => 'INV-000005',
                'delivery_number'   => '0005',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-06-01')),
                'invoice'           => 'INV-000006',
                'delivery_number'   => '0006',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-07-01')),
                'invoice'           => 'INV-000007',
                'delivery_number'   => '0007',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-08-01')),
                'invoice'           => 'INV-000008',
                'delivery_number'   => '0008',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-09-01')),
                'invoice'           => 'INV-000009',
                'delivery_number'   => '0009',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-10-01')),
                'invoice'           => 'INV-000010',
                'delivery_number'   => '0010',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-11-01')),
                'invoice'           => 'INV-000011',
                'delivery_number'   => '0011',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 5,
                'order_date'        => date('Y-m-d', strtotime('2024-12-01')),
                'invoice'           => 'INV-000012',
                'delivery_number'   => '0012',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];

        foreach ($orders as $key => $value) {
            Order::create($value);
        }

        // Seeder for Order Detail
        $order_details = [
            [
                'order_id'          => 1,
                'customer_id'       => 1,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 2,
                'customer_id'       => 2,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 3,
                'customer_id'       => 3,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 4,
                'customer_id'       => 1,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 5,
                'customer_id'       => 2,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 6,
                'customer_id'       => 3,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 7,
                'customer_id'       => 1,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 8,
                'customer_id'       => 2,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 9,
                'customer_id'       => 3,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 10,
                'customer_id'       => 1,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 11,
                'customer_id'       => 2,
                'product_id'        => 1,
                'product_quantity'  => 10,
                'total_price'       => 29900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'order_id'          => 12,
                'customer_id'       => 3,
                'product_id'        => 2,
                'product_quantity'  => 10,
                'total_price'       => 12900000,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];

        foreach ($order_details as $key => $value) {
            OrderDetail::create($value);
        }
    }
}
