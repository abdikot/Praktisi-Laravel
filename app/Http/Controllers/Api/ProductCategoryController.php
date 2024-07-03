<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function getData()
    {
        $product_categories = ProductCategory::all();
        return $this->responseSuccess($product_categories);
    }
    public function find($id)
    {
        $product_categories = ProductCategory::find($id);
        return $this->responseSuccess($product_categories);
    }

    public function findName($name)
    {
        $product_categories = ProductCategory::find($name);
        return $this->responseSuccess($product_categories);
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                'unique:product_categories,name'
            ],
            'description' => 'required'
        ],[
            'name.required' => 'Kolom nama harus diisi',
            'name.max' => 'Kolom nama maksimal 10 karakter',
            'name.unique' => 'Nama sudah digunakan'
        ]);
        $product_categories = ProductCategory::create($request->except('_token'));
        return $this->responseSuccess($product_categories);
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:10',
                'unique:product_categories,name,'.$id
            ],
            'description' => 'required'
            ],[
                'name.required' => 'Kolom nama harus diisi',
                'name.max' => 'Kolom nama maksimal 10 karakter',
                'name.unique' => 'Nama sudah digunakan'
                ]);
        $product_categories = ProductCategory::find($id);
        $product_categories->update($request->except('_token'));
        return $this->responseSuccess($product_categories, 'Data Product Category berhasil diubah');
    }
    public function delete($id)
    {
        $product_categories = ProductCategory::find($id);
        $product_categories->delete();
        return $this->responseSuccess($product_categories, 'Data Product Category berhasil dihapus');
    }
}