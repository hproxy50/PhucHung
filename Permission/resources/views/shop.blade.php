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


      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


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
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('front/css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('front/images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('front/css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="{{asset('front/https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css')}}">
      <!-- fonts -->
      <link href="{{asset('front/https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap')}}" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="{{asset('front/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="{{asset('front/https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('front/css/owl.carousel.min.css')}}">
      <link rel="stylesoeet" href="{{asset('front/css/owl.theme.default.min.css')}}">
      <link rel="stylesheet" href="{{asset('front/https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css')}}" media="screen">
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
        <div class="search-form-group me-2 flex-grow-1" style="margin-top:10px">
          <div class="search-input-group">
            <input type="text" name="query" placeholder="Search..." class="form-control" value="{{ request()->query('query') }}">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="category-form-group ms-2 "style="margin-top:10px">
         
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
      

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-bottom: 60px">
  
  {{-- <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>  --}}

  <ol class="carousel-indicators">
    @for ($i = 0; $i < count($banners); $i++)
      <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="{{ $i == 0 ? 'active' : '' }}"></li>
    @endfor
  </ol>

   <div class="carousel-inner">
    
    @foreach ($banners as $banner)
    <div class="carousel-item @if ($loop->first) active @endif">
      <img src="{{ asset('images/'.$banner->image) }}" class="d-block w-100" alt="Slide 1" style="height: 350px; weight: 100px">
      <div class="carousel-caption d-none d-md-block">
        <h1 class="banner_taital" style="color:black;">{{$banner->description}}</h1>
                              <div class="buynow_bt"><a href="#">Buy Now</a></div>
      </div>
    </div>
    @endforeach
  </div>
  
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<script>
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 3000 // change the interval time in milliseconds here
    });
  });
</script>




      <div class="row" id="product">
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
    <script>
      $('.buynow_bt a').click(function(e) {
   e.preventDefault(); // prevent the default behavior of the link
   var target = $('#product'); // replace "product1" with the ID of your product div
   $('html, body').animate({
      scrollTop: target.offset().top // scroll to the top of the product div
   }, 1000); // adjust the animation speed as needed
});

    </script>
    <script src="{{asset('front/js/jquery.min.js')}}"></script>
      <script src="{{asset('front/js/popper.min.js')}}"></script>
      <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('front/js/jquery-3.0.0.min.js')}}"></script>
      <script src="{{asset('front/js/plugin.js')}}"></script>
      <!-- sidebar -->
      <script src="{{asset('front/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('front/js/custom.js')}}"></script>
      <script>
    @include('footer') 
</html>

