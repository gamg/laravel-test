<?php

namespace App\Services;

use App\Models\Product;

class Products
{
    public function get()
    {
        return Product::all();
    }
}
