@extends('layouts.user')


@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-semibold text-center mb-6">All Products</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @forelse($allProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <a href="{{route('products.show', $product->id)}}">
                <img src="{{asset('images/products'."/".$product->image)}}" alt="Product 1" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{route('products.show', $product->id)}}">
                    <h2 class="font-bold text-lg">
                        {{$product->name}}
                        @forelse($product->categories as $category)
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$category->name}}</span>
                        @empty

                        @endforelse
                    </h2>
                    <p class="text-gray-700">Rs. {{$product->price}}</p>
                    <p class="text-gray-600">{{Str::limit($product->description, 100)}}</p>
                    </a>
                    <button class="mt-2 bg-blue-500 text-white rounded-md px-4 py-2 hover:bg-blue-600">Add to Cart</button>
                </div>
            </div>
        @empty
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-4">
                    <h2 class="font-bold text-lg">No Products found</h2>
            </div>
        @endforelse
    </div>
</div>
</div>
@endsection
