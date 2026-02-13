<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DtiAuroraSeeder extends Seeder
{
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | STORE DATA
        |--------------------------------------------------------------------------
        */
        $storeData = [
            [
                'id' => 1,
                'name' => 'PureGold',
                'municipality' => 'Baler',
                'location' => 'Brgy.Suclayin,Baler,Aurora'
            ],
            [
                'id' => 2,
                'name' => 'Novo',
                'municipality' => 'Baler',
                'location' => 'Brgy.Buhangin,Baler,Aurora'
            ],
            [
                'id' => 3,
                'name' => 'N.E',
                'municipality' => 'Baler',
                'location' => 'Brgy.Suclayin,Baler,Aurora'
            ],
            [
                'id' => 4,
                'name' => 'Robinsons',
                'municipality' => 'Baler',
                'location' => 'Brgy.Pingit,Baler,Aurora'
            ],
            [
                'id' => 5,
                'name' => 'IKAS',
                'municipality' => 'CASIGURAN',
                'location' => 'Brgy.4,Casiguran,Aurora'
            ],
        ];

        $this->db->table('store')->insertBatch($storeData);


        /*
        |--------------------------------------------------------------------------
        | PRODUCT DATA
        |--------------------------------------------------------------------------
        */
        $productData = [
            [
                'id' => 1,
                'name' => 'white candles',
                'category' => 'candles',
                'size' => '3pc',
                'store_id' => 1
            ],
            [
                'id' => 2,
                'name' => '555 Tuna Flakes in Oil',
                'category' => 'CAN',
                'size' => '155g',
                'store_id' => 3
            ],
            [
                'id' => 3,
                'name' => 'white candles',
                'category' => 'candles',
                'size' => '3pc',
                'store_id' => 2
            ],
            [
                'id' => 4,
                'name' => 'Mega Sardines',
                'category' => 'can',
                'size' => '155g',
                'store_id' => 4
            ],
            [
                'id' => 5,
                'name' => 'Brown Sugar',
                'category' => 'Sugar',
                'size' => '500g',
                'store_id' => 5
            ],
        ];

        $this->db->table('product')->insertBatch($productData);


        /*
        |--------------------------------------------------------------------------
        | PRODUCT PRICE DATA
        |--------------------------------------------------------------------------
        */
        $priceData = [
            ['id' => 1, 'product_id' => 1, 'store_id' => 1, 'price' => 25.00, 'date' => '2026-02-09'],
            ['id' => 2, 'product_id' => 3, 'store_id' => 2, 'price' => 12.00, 'date' => '2026-02-12'],
            ['id' => 3, 'product_id' => 2, 'store_id' => 3, 'price' => 26.00, 'date' => '2026-02-11'],
            ['id' => 4, 'product_id' => 4, 'store_id' => 4, 'price' => 25.00, 'date' => '2026-02-11'],
            ['id' => 5, 'product_id' => 5, 'store_id' => 5, 'price' => 89.00, 'date' => '2026-02-11'],
            ['id' => 6, 'product_id' => 5, 'store_id' => 5, 'price' => 50.00, 'date' => '2026-02-12'],
            ['id' => 7, 'product_id' => 5, 'store_id' => 5, 'price' => 65.00, 'date' => '2026-02-13'],
            ['id' => 8, 'product_id' => 1, 'store_id' => 2, 'price' => 20.00, 'date' => '2026-02-12'],
            ['id' => 9, 'product_id' => 1, 'store_id' => 2, 'price' => 24.00, 'date' => '2026-02-14'],
            ['id' => 10, 'product_id' => 1, 'store_id' => 1, 'price' => 15.00, 'date' => '2026-02-12'],
        ];

        $this->db->table('product_price')->insertBatch($priceData);
    }
}
