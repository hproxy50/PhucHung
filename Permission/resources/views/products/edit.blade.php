@role('admin')
@extends('products.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')

<div class="row" style="margin-top:50px">
    <div class="col-md-12">
        <a href="{{ url('/products') }}" class="btn btn-primary mb-3">Back</a>
    </div>
</div>
<form action="{{route('products.update',$product ->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Name" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="desc"><strong>Description:</strong></label>
                <input type="text" name="desc" value="{{$product->desc}}" class="form-control" placeholder="Description" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="price"><strong>Price:</strong></label>
                <input type="number" name="price" placeholder="Price" min="0" step="0.01" class="form-control" required/>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="form-group">
                <label for="category_id"><strong>Select Category:</strong></label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}" {{ $item->id == $product->category_id ? 'selected' : '' }}>{{$item->name}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6" style="margin: 20px 0 20px 0">
            <div class="form-group">
                <label for="image"><strong>Image:</strong></label>
                <input type="file" name="image" value="{{$product->image}}" class="form-control-file" required>
                <img src="/images/{{$product ->image}}" width="250px" alt="">
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>    
@endsection
@endrole