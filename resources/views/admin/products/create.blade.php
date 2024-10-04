@extends('layouts.admin')

@section('title')
    Create Products
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="productName">Product name</label>
            <input type="text" class="form-control" name="name" id="productName" placeholder="Enter name" required>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="productDesc">Product description</label>
            <input type="text" class="form-control" name="description" id="productDesc" placeholder="Enter description" required>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="productPrice">Product price</label>
            <input type="number" class="form-control" name="price" id="productPrice" placeholder="Enter price" required>
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="productQuantity">Product quantity</label>
            <input type="number" class="form-control" name="quantity" id="productQuantity" placeholder="Enter quantity" required>
            @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input class="form-control" name="imagePhoto" type="file" id="productImage" required>
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="productCategory">Product category</label>
            <select class="form-control" name="category_id" id="productCategory" required>
                <option value="" selected disabled>Select One</option>
                @forelse($allCategories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @empty
                    <option disabled>No Categories Found</option>
                @endforelse
            </select>
            @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
