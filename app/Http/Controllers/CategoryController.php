<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Create Category
    //______________________
    public function store(CategoryStoreRequest $request)
    {
        $Category = Category::query()->create($request->validated());
        return response()->json(
            [
                'message' => 'Category created successfully',
                'category' => $Category
            ],
            201
        );
    }

    //Get All Products of a Category
    //_____________________________
    public function show($id)
    {
        $category = Category::with('products')->findOrFail($id);
        return response()->json(
            ['category' => $category],
            200
        );
    }

    //Delete category
    //_____________________
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category->products()->count() > 0) {
            return response()->json(
                [
                    'message' => 'This category has products,deletion is not allowed',
                ],
                409
            );
        } else {
            $category->delete();
            return response()->json([
                'message' => 'This category  deleted successfully'
            ], 200);
        }
    }
}
