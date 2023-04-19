<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>HungNP</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="shortcut icon" href="https://svgur.com/i/sDf.svg">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="{{asset('https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}">
      <!-- fonts -->
      <link href="{{asset('https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap')}}" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="{{asset('https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen">
      <style>
.search-form-group {
  width: 10cm;
}

.search-input-group {
  display: flex;
  align-items: center;
}

.category-form-group {
  display: inline-block; 
  margin-left: 15cm;
}

.form-control {
  border-radius: 0;
  height: 40px;
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
.paddma{
  padding-left: 2cm;
  padding-right: 2cm;
 background-image: url('https://i.pinimg.com/originals/1d/26/c5/1d26c5b022c071fb8f1e3ae2f0f65ba9.gif');
 /* background-repeat: no-repeat; */
}
.body{
  
}

      </style>
 
   </head>

   <x-app-layout>
  </x-app-layout>
    <body>
      @extends('products.app')
      <div class="paddma">
      <form action="{{ route('shop.index') }}" method="GET" class="d-flex align-items-center" style="margin-top: 50px; margin-bottom: 50px">
        <div class="search-form-group me-2">
          <div class="search-input-group">
            <input type="text" name="query" placeholder="Search..." class="form-control" value="{{ request()->query('query') }}">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="category-form-group" style="padding-left:6cm " >
          <strong>Select Category:</strong>
          <select name="category_name" class="form-control" onchange="this.form.submit()" style="width: 250px">
            <option value="">All Categories</option>
            @foreach ($categories as $category)
              <option value="{{ $category->name }}"{{ $category_name == $category->name ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>
      </form>

      <div class="cart-icon">
        <a href="http://127.0.0.1:8000/cart">
          <i class="fa fa-shopping-cart"></i>
        </a>
      </div>
      
      <div class="row">
        @foreach ($products as $product)
          <div class="col-md-4 mb-4">
            <div class="card h-100" style="background-image: url('')">
              <div class="card-header text-uppercase font-weight-bold">{{ $product->name }}</div>
              <div class="card-body">
                <img src="{{ asset('images/'.$product->image) }}" class="card-img-top mb-3" alt="{{ $product->name }}">
                <p class="card-text mb-3">{{ number_format($product->price, 2, '.', ',') }} $</p>
                <div class="d-flex justify-content-between align-items-center">
                  <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="quantity-input">Quantity:</label>
                      <input type="number" class="form-control" name="quantity" id="quantity-input" value="1" min="1">
                    </div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="btn-group" role="group">
                      <button type="submit" class="btn btn-primary">Add to cart <i class="fa-solid fa-cart-plus"></i></button>
                      <a href="{{ route('products.show', $product->id) }}" style="margin-left: 180px" class="btn btn-link">See more</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach 
      </div> 
    </div>            
    </body> 
    @include('footer') 
</html>

