@extends('layout')

@section('content')
<br /><br />
<div class="row">
    <div class="col-sm-12">
        <h1>Product</h1>
    </div>
    <div class="col-sm-12">
        <a href="{{ route('product.create') }}" class="btn btn-primary">Create</a>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <table class="table table-hovered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product Category</th>
                    <th>Unit</th>
                    <th>Minimal Stock</th>
                    <th>Maximal Stock</th>
                    <th>Stock</th>
                    <th>Selling Price</th>
                    <th>Purchase Price</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($products as $product)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->unit }}</td>
                    <td>{{ $product->minimal_stock }}</td>
                    <td>{{ $product->maximal_stock }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->selling_price }}</td>
                    <td>{{ $product->purchase_price }}</td>
                    <td>
                        <form method="post" action="{!! route('product.destroy',$product->id) !!}">
                            @csrf @method('DELETE')
                            <a href="{!! route('product.edit',$product->id) !!}" class="btn btn-primary"> Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection