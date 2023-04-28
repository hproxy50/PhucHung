@role('admin')
@extends('banners.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')

<div class="row" style="margin-top:50px">
    <div class="col-md-12">
        <a href="{{ url('/banners') }}" class="btn btn-primary mb-3">Back</a>
    </div>
</div>
<form action="{{route('banners.update',$banner ->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title"><strong>Title:</strong></label>
                <input type="text" name="title" value="{{$banner->name}}" class="form-control" placeholder="Name" required>
            </div>
        </div> 
        <div class="col-md-6" style="margin: 20px 0 20px 0">
            <div class="form-group">
                <label for="image"><strong>Image:</strong></label>
                <input type="file" name="image" value="{{$banner->image}}" class="form-control-file" required>
                <img src="/images/{{$banner ->image}}" width="250px" alt="">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="description"><strong>Description:</strong></label>
                <input type="text" value="{{$banner->description}}" name="description" placeholder="Description" class="form-control" required/>
            </div>
        </div> 
        
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>    
@endsection
@endrole