@extends('layouts.user')

@section('content')
    <div class="h-full w-full">
        <span>

        </span>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

            @if(session("success"))
                <div class="bg-red-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">{{session('success')}}!</strong>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
                </div>
            @endif
                @if(session("error"))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">{{session('error')}}!</strong>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path
            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
                    </div>
                @endif
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    <th scope="col" class="px-6 py-3">
                        Product Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price per item
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Quantity
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @php
                    $totalPrice = 0;
                @endphp

                @forelse($cartItems as $item)

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4">
                            {{$item->product->name}}
                        </td>
                        <td class="px-6 py-4">
                            <img class="h-20 rounded" src="{{asset('images/products/'.$item->product->image)}}"
                                 alt="Jese image">
                        </td>
                        <td class="px-6 py-4">
                            Rs. {{$item->product->price}}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{$item->quantity}}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{route('cart.destroy', $item->id)}}" method="post" onsubmit="return confirm('Are you sure you want to remove this item?');">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 p-3 rounded text-white hover:bg-red-600" type="submit">
                                    Remove
                                </button>
                            </form>

                        </td>

                        @php $totalPrice += ($item->product->price * $item->quantity) @endphp
                    </tr>
                @empty
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="px-6 py-4 " colspan="4">
                            <div class="flex items-center ">
                                <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2 "></div>
                                Cart is empty
                            </div>
                        </td>

                    </tr>
                @endforelse

                </tbody>
            </table>
            <div class="m-3 text-center">
                Total Price : Rs <b>{{$totalPrice}}</b>
            </div>
            <div class="flex align-middle justify-center">
                <button id="payment-button" class="p-2 bg-blue-800 text-white rounded">Order Now</button>
            </div>
        </div>

    </div>
@endsection

@section('js')

@endsection

