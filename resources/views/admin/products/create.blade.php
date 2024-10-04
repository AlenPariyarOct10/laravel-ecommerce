@extends('layouts.admin')


@section('title')
    Create Products
@endsection


@section('content')
    <form method="POST">
        <div class="form-group">
            <label for="productName">Product name</label>
            <input type="text" class="form-control" id="productName" aria-describedby="productName" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="productPrice">Product price</label>
            <input type="number" class="form-control" id="productPrice" aria-describedby="productPrice" placeholder="Enter price">
        </div>
        <div class="form-group">
            <label for="productCategory">Product category</label>
            <select class="form-control" name="productCategory" id="productCategory">
                <option value="null" selected disabled>Select One</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
