@extends('layout')

@section('content')
<br /><br />
<h1>Edit Product</h1>
<form method="POST" action="{{ route('product.update', $product->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
    </div>
    <div class="mb-3">
        <label for="product_category_id" class="form-label">Product Category</label>
        <select class="form-control" id="product_category_id" name="product_category_id">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $product->product_category_id == $category->id ? 'selected' : '' }}>
                {{ $category->id }} - {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="unit" class="form-label">Unit</label>
        <input type="text" class="form-control" id="unit" name="unit" value="{{ $product->unit }}">
    </div>
    <div class="mb-3">
        <label for="minimal_stock" class="form-label">Minimal Stock</label>
        <input type="text" class="form-control" id="minimal_stock" name="minimal_stock"
            value="{{ $product->minimal_stock }}">
    </div>
    <div class="mb-3">
        <label for="maximal_stock" class="form-label">Maximal Stock</label>
        <input type="text" class="form-control" id="maximal_stock" name="maximal_stock"
            value="{{ $product->maximal_stock }}">
    </div>
    <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control" id="stock" name="stock" value="{{ $product->stock }}">
    </div>
    <div class="mb-3">
        <label for="selling_price" class="form-label">Selling Price</label>
        <input type="text" class="form-control" id="selling_price" name="selling_price"
            value="{{ $product->selling_price }}">
    </div>
    <div class="mb-3">
        <label for="purchase_price" class="form-label">Purchase Price</label>
        <input type="text" class="form-control" id="purchase_price" name="purchase_price"
            value="{{ $product->purchase_price }}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection