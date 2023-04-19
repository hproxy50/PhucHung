@role('admin')
@extends('categories.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')
<div class="card" style="padding: 0 2cm 0 2cm">
    <div class="card-body">
        <div class="row" style="margin-top: 20px; margin-bottom: 10px">
            <div class="col-md-6">
                <a class="btn btn-primary" href={{ url('/category') }}>Back</a>
            </div>
        </div>
        <form action={{url('category')}} method="post">
            {!! csrf_field() !!}
            <label>Name</label></br>
            <input type="text" name="name" id="name" class="form-control" required></br>
            <input type="submit" value="Save" class="btn btn-success"></br>        
            </form>
    </div>
</div>
@endsection
@endrole