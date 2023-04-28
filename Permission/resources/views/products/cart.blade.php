@extends('products.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Your Cart</h3>
        </div>
        <div class="card-body">
            @if(count($cartItems) > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Remove</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $key => $cartItem)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{$cartItem->name}}</td>
                            <td>{{$cartItem->price}}$</td>
                            <td>
                                <form action="{{ route('cart.update', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group">
                                        <input type="number" name="quantity" value="{{$cartItem->quantity}}" class="form-control">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </td>
                            <td>{{$cartItem->price * $cartItem->quantity}}$</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>                               
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="4" align="right"><strong>Total:</strong></td>
                            <td><strong>{{$totalPrice}}$</strong></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-12 text-center">
                    <a href="{{ url('/shop') }}" class="btn btn-primary btn-sm">Continue Shopping</a>
                </div>
            </div>
            @else
            <p>Your cart is empty.</p>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-sm">Continue Shopping</a>
            @endif
        </div>
    </div>
</div>
@endsection