<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
   
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products()->latest()->get();

        return view('frontend.category.products', compact('category', 'products'));
    }
}
