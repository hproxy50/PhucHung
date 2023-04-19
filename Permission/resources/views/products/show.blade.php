<x-app-layout>
    @extends('products.app')
    @include('icon')
    <div class="cart-icon">
        <a href="http://127.0.0.1:8000/cart">
          <i class="fa fa-shopping-cart"></i>
        </a>
      </div>
    <div class="row" style="padding: 0 4cm 0 4cm; margin-bottom:50px">
        <div class="col-md-6 col-sm-12">
            <div class="row">
                <div class="pull-right" style="margin-top: 50px"><a class="btn btn-primary" href="{{ url('/shop') }}">Back</a></div>    
            </div>
            <div class="product-image" >
                <img src="/images/{{$product->image}}" style="width: 300%; height: 300%;" alt="{{$product->name}}">
            </div>
        </div>
        
        <div class="col-md-6 col-sm-12">
            <div class="product-details">
                <h1>Name: {{$product->name}}</h1>
                <p class="product-price">Price: {{$product->price}}$</p>
                <p class="product-category"><strong>Category: </strong>{{ $product->category->name }}</p>
                <p class="product-description"><strong>Description: </strong>{{$product->desc}}</p>               
                <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label"><strong>Quantity: </strong></label>
                        <div class="col-sm-4">
                            <input type="number" name="quantity" class="form-control" id="quantity" min="1" value="1">
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary d-inline-block">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
    <style>
    .product-image {
    margin-top: 50px;
    width: 300px;    
    }
    .product-details {
    padding: 20px;
    }
    .product-details h1 {
    font-weight: bold;
    margin-top: 80px;
    }
    .product-details p.product-price {
    font-size: 24px;
    font-weight: bold;
    margin-top: 20px;
    color: red;
    }
    .product-details p.product-description {
    margin-top: 20px;
    max-width: 300px;
    }
    .btn-add-to-cart {
    margin-top: 20px;
    }   
    .btn {
    border-radius: 0;
    height: 40px;
    }
    .cart-icon {
    position: fixed;
    right: 20px;
    top: 20px;
    background-color: #fff;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    text-align: center;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    }
    .cart-icon i {
    font-size: 25px;
    color: #555;
    line-height: 50px;
    }

    .cart-icon .cart-count {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    color: #fff;
    font-size: 12px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    line-height: 20px;
    }
    </style>
    </x-app-layout>
    @include('footer')