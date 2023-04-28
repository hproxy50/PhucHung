@role('admin')
@extends('banners.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin: 50px 0 5px 0">
    <a class="btn btn-primary" href="{{route('banners.create')}}">Create new <i class="fa-solid fa-plus"></i></a>
    
</div>


<table class="table table-bordered">
    <tr>
        <th>Title</th>
        <th>Image</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    @foreach ($banners as $banner)
    <tr>
        <td style="max-width:260px">{{ $banner->title }}</td>
        <td><img src="/images/{{ $banner->image }}" width="250px" alt=""></td>
        
        <td style="max-width:300px">{{ $banner->description }}</td>
        
        <td>
            <form action="{{ route('banners.destroy', $banner->id) }}" method="POST">
                <a class="btn btn-warning" href="{{ route('banners.edit', $banner->id) }}">Edit <i class="fa-solid fa-pen-to-square"></i></a>
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete <i class="fa-solid fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>   
@endsection
@endrole