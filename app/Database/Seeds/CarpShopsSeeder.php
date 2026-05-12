<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CarpShopsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'           => 'Aurora Honey Bee Coop',
                'type'           => 'cooperative',
                'location'       => 'Brgy. 1, Maria Aurora, Aurora',
                'contact_number' => '09171234567',
                'description'    => 'Community‑based cooperative producing pure raw honey and bee by‑products.',
                'image'          => null,
                'tags'           => 'Honey,Organic,Cooperative',
                'status'         => 'active',
            ],
            [
                'name'           => 'Baler Weavers Association',
                'type'           => 'arb',
                'location'       => 'Brgy. Sabang, Baler, Aurora',
                'contact_number' => '09281234568',
                'description'    => 'ARB group specialising in handwoven abaca bags, mats, and home décor.',
                'image'          => null,
                'tags'           => 'Abaca,Handicraft,ARB',
                'status'         => 'active',
            ],
            [
                'name'           => 'Island Essentials PH',
                'type'           => 'shop',
                'location'       => 'Brgy. Suklayin, Baler, Aurora',
                'contact_number' => '09191234569',
                'description'    => 'Shop offering organic coconut soap, virgin coconut oil, and wellness products.',
                'image'          => null,
                'tags'           => 'Coconut,Organic,Wellness',
                'status'         => 'active',
            ],
            [
                'name'           => 'Green Leaf Maria Aurora',
                'type'           => 'cooperative',
                'location'       => 'Brgy. 2, Maria Aurora, Aurora',
                'contact_number' => '09051234570',
                'description'    => 'Cooperative growing and processing herbal teas, dried herbs, and spices.',
                'image'          => null,
                'tags'           => 'Herbal,Tea,Cooperative',
                'status'         => 'active',
            ],
            [
                'name'           => 'Dipaculao Handicraft ARB',
                'type'           => 'arb',
                'location'       => 'Brgy. Diarabasin, Dipaculao, Aurora',
                'contact_number' => '09981234571',
                'description'    => 'ARB group creating macramé wall hangings, plant hangers, and bohemian crafts.',
                'image'          => null,
                'tags'           => 'Macrame,Handicraft,ARB',
                'status'         => 'pending',
            ],
            [
                'name'           => 'Casiguran Organic Farmers',
                'type'           => 'cooperative',
                'location'       => 'Brgy. San Ildefonso, Casiguran, Aurora',
                'contact_number' => '09391234572',
                'description'    => 'Cooperative of organic rice farmers supplying heirloom and brown rice.',
                'image'          => null,
                'tags'           => 'Rice,Organic,Cooperative',
                'status'         => 'active',
            ],
        ];

        // Insert using the model (handles timestamps automatically)
        $shopModel = model('App\Models\ShopModel');
        foreach ($data as $shop) {
            $shopModel->insert($shop);
        }
    }
}