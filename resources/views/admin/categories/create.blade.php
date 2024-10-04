@extends('layouts.admin')


@section('title')
    Create Category
@endsection


@section('content')
    <form method="POST" action="{{route('admin.categories.store')}}">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif

        <div class="form-group">
            <label for="productName">Category name</label>
            <input type="text" class="form-control" id="productName" aria-describedby="productName" name="name"
                   placeholder="Enter title">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
