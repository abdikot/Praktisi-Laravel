<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function create(){
        $categories = ProductCategory::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // \Log::info('Request Data: ', $request->all());
        $request->validate([
            'name' => 'required | string | max:255',
            'product_category_id' => 'required | exists:product_categories,id',
            'unit' => 'required|string|max:255',
            'minimal_stock' => 'required|integer',
            'maximal_stock' => 'required|integer',
            'stock' => 'required|integer',
            'selling_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
        ]);

        Product::create($request->except('_token'));

        return redirect()->route('product.index')
        ->with('success', 'Product created successfully');
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return view('product.show', compact('products'));
    }
    public function edit(string $id)
    {
        $categories = ProductCategory::all();
        $product = Product::find($id);
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, string $id){
        $request->validate
        ([
            'name' => 'required | string | max:255',
            'product_category_id' => 'required | exists:product_categories,id',
            'unit' => 'required|string|max:255',
            'minimal_stock' => 'required|integer',
            'maximal_stock' => 'required|integer',
            'stock' => 'required|integer',
            'selling_price' => 'required|numeric',
            'purchase_price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        $product->update($request->except('_token'));

        return redirect()->route('product.index')
        ->with('success', 'Product updated successfully');
            
    }
    public function destroy(string $id)
    {
        $product = Product::find($id)->delete();
        return redirect()->route('product.index')
        ->with('success', 'Product deleted successfully');
    }





}