@extends('layout')

@section('content')
<br /><br />
<h1>Create Product</h1>
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label>">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{!!old('name')!!}">
        @if ($errors->has('name'))
        <div class="alert alert-danger">
            {{$errors->first('name')}}
        </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="product_category_id" class="form-label">Product Category</label>
        <select class="form-control" id="product_category_id" name="product_category_id">
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('product_category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->id }} - {{ $category->name }}
            </option>
            @endforeach
        </select>
        @if ($errors->has('product_category_id'))
        <div class="alert alert-danger">
            {{ $errors->first('product_category_id') }}
        </div>
        @endif
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Unit</label>
        <input type="text" class="form-control" id="unit" name="unit" value="{!!old('unit')!!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Minimal Stock</label>
        <input type="text" class="form-control" id="minimal_stock" name="minimal_stock"
            value="{!!old('minimal_stock')!!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Maximal Stock</label>
        <input type="text" class="form-control" id="maximal_stock" name="maximal_stock"
            value="{!!old('maximal_stock')!!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Stock</label>
        <input type="text" class="form-control" id="stock" name="stock" value="{!!old('stock')!!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Selling Price</label>
        <input type="text" class="form-control" id="selling_price" name="selling_price"
            value="{!!old('selling_price')!!}">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label>">Purchase Price</label>
        <input type="text" class="form-control" id="purchase_price" name="purchase_price"
            value="{!!old('purchase_price')!!}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection