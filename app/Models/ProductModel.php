<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'carp_shop_products';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;

    protected $allowedFields = [
        'carp_shop_id',
        'name',
        'price',
        'category',
        'description',
        'image',
        'tags',
        'status',
    ];
}