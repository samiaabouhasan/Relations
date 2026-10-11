<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Create Product
    //________________
    public function store(ProductStoreRequest $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $product = $category->products()->create($request->validated());
        return response()->json(
            [
                'message' => 'product created successfully',
                'product' => $product
            ],
            201
        );
    }

    //Get Product Details
    //________________________________
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return response()->json(
            [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'category_name' => $product->category->name
            ],
            200
        );
    }
}
