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

    public function show($id)
    {
        // Get individual product
        $product = $this->product->findOrFail($id);

        // Send response
        return response()->json($product, 200);
    }

    public function store(Request $request)
    {
        // Validate request
        $valid = $this->validate($request, [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'attributes' => 'string',
        ]);

        // Create product
        $product = new $this->product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->attributes = $request->input('attributes');

        // Save product
        $product->save();

        // Send response
        return response()->json($product, 201);
    }
}
