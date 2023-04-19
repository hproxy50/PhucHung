<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/.../dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@include('icon')
<x-app-layout>
<div class="container" style="margin-top: 50px; margin-bottom: 50px ">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Shopping Cart') }}</div>
  
          <div class="card-body">
            @if(Session::has('products.cart'))
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
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($cartItems ?? [] as $products)
                    <tr>
                      <th scope="row">{{ $i++ }}</th>
                      <td>{{ $products['name']}}</td>
                      <td>{{ $products['price']}}$</td>
                      <td>{{ $products['quantity']}}</td>
                      <td>{{ $products['price'] * $products['quantity'] }}$</td>
                      <td>
                        <form action="{{ route('cart.remove', $products['id']) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
  
                    <tr>
                      <td colspan="4" align="right"><strong>Total:</strong></td>
                      <td><strong>{{ $totalPrice }}$</strong></td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <a href="{{ url('/shop') }}" class="btn btn-primary btn-sm">Continue Shopping</a>
                  <a class="btn btn-success btn-sm" onclick="orderSuccess()">Order</a>
                </div>
              </div>
            @else
              <p>Your cart is empty.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  </x-app-layout>
  <div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-labelledby="orderSuccessModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="orderSuccessModalLabel">Ordered Success!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Your order has been placed successfully. Thank you for shopping with us!
        </div>
        <div class="modal-footer">
          <a href="http://127.0.0.1:8000/shop"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  function orderSuccess() {
    $('#orderSuccessModal').modal('show');
  }
  </script>
@include('footer')



  