@role('admin')
@extends('products.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')

<div class="row" style="margin-top: 50px">
    <div class="col-md-6">
        <a class="btn btn-primary" href={{ url('/products') }}>Back</a>
    </div>
</div>
<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Description:</strong>
                <input type="text" name="desc" class="form-control" placeholder="Description" required/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Price:</strong>
                <input type="number" name="price" class="form-control" placeholder="Price" min="0" step="0.01" required/>
            </div>
        </div>        
        <div class="col-md-6">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="Image" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Select Category:</strong>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 23px">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>        
    </div>
</form>
@endsection
@endrole