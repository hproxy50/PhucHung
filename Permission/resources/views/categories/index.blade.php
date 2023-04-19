@role('admin')
@extends('categories.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')
<div class="container">
<div class="card-body">
<div class="d-flex justify-content-between align-items-center mb-3">
<h4>Categories</h4>
<a href="{{ url('/category/create') }}" class="btn btn-primary">Create new <i class="fa-solid fa-plus"></i></a>
</div>
<div class="table table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>
                    <a href="{{ url('/category/' . $item->id . '/edit') }}"><button class="btn btn-warning btn-sm">Edit <i class="fa-solid fa-pen-to-square"></i></button></a>
                    <form method="POST" action={{ '/category' . '/' . $item->id }} style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirm delete?')">Delete <i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>

            </tr>
            
            @endforeach
        </tbody>

    </table>
</div>
</div>
</div>
@endsection
@endrole