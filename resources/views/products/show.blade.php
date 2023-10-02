@include('products.index')
<div class="container my-3">
    <div class="text-right">
        <a href="{{ '/product' }}" class="btn btn-dark"> View Data</a>
    </div>
</div>
<div class="container text-center">
  <div class="row">
    <div class="col">
   <h3>ID</h3>
    </div>
    <div class="col">
    <h3>Name</h3>
    </div>
    <div class="col">
    <h3>Email</h3>
    </div>
    <div class="col">
    <h3>Description</h3>
    </div>
    <div class="col">
    <h3>Image</h3>
    </div>
  </div>
</div>
<hr>
<div class="container text-center">
  <div class="row">
    <div class="col">
    {{ $products->id}} 
    </div>
    <div class="col">
    {{ $products->name}} 
    </div>
    <div class="col">
    {{ $products->email}} 
    </div>
    <div class="col">
    {{ $products->description}} 
    </div>
    <div class="col">
    <img src="/products_image/{{ $products->image }}" width="100">
    </div>
  </div>
</div>