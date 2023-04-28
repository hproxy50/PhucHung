@role('admin')
@extends('banners.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')

        <div class="row" style="margin-top: 20px; margin-bottom: 10px">
            <div class="col-md-6">
                <a class="btn btn-primary" href={{ url('/banners') }}>Back</a>
            </div>
        </div>
        <form action="{{route('banners.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" class="form-control" placeholder="title" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" class="form-control" placeholder="description" required/>
                    </div>
                </div>
                <div class="col-md-6" style="margin-top: 23px">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>        
            </div>
        </form>

@endsection
@endrole
