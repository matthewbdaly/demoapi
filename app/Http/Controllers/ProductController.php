<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function index()
    {
        // Get all products
        $products = $this->product->all();

        // Send response
        return response()->json($products, 200);
    }
}
