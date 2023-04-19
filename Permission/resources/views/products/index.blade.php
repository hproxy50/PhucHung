@role('admin')
@extends('products.app')
@include('icon')
<x-app-layout>
</x-app-layout>
@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin: 50px 0 5px 0">
    <a class="btn btn-primary" href="{{route('products.create')}}">Create new <i class="fa-solid fa-plus"></i></a>
    <form action="{{route('products.index')}}" method="GET" style="display: flex; align-items: center;">
        <input type="text" name="query" placeholder="Search..." style="padding: 10px; border: 2px solid rgb(0, 162, 255); border-radius: 5px; width: 250px; margin-right: 10px;">
        <button type="submit" style="background-color: orange; border-radius: 5px; padding: 10px; border: none; color: white; cursor: pointer;"><i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>


<table class="table table-bordered">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td><img src="/images/{{ $product->image }}" width="250px" alt=""></td>
        <td style="max-width:260px">{{ $product->name }}</td>
        <td style="max-width:300px">{{ $product->desc }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->category->name }}</td>
        <td>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show <i class="fa-solid fa-eye"></i></a>
                <a class="btn btn-warning" href="{{ route('products.edit', $product->id) }}">Edit <i class="fa-solid fa-pen-to-square"></i></a>
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