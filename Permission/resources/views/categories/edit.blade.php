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
            <form method="post" action="{{ url('/category/' . $category->id) }}">
                @csrf
                {!! csrf_field() !!}
                {{-- {!! method_field('put') !!} --}}
                @method("PATCH")
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                </div>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px">Update</button>
            </form>
        </div>
    </div>
@endsection
@endrole