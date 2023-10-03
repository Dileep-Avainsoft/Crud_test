
@include('products.index')
@if($message = Session::get('success'))

    <div class="alert alert-success alert-block"><strong>{{ $message }}</strong></div>

@endif
<div class="container my-3">
    <div class="text-right">
    <a href="{{ 'product.create' }}" class="btn btn-dark"> Add Data</a>
    </div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Description</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    @foreach($products as $product)
    <tbody>
    <tr>

        <td> {{ $product->id }}</td>
        <td> {{ $product->name }}</td>
        <td> {{ $product->email }}</td>
        <td> {{ $product->description }}</td>
        <td> <img src="products_image/{{ $product->image }}" width="100"></td>
        <td><a href="products/edit/{{encrypt($product->id)}}" class="btn btn-primary">Edit</a>
        <a href="products/show/{{encrypt($product->id)}}" class="btn btn-success">View</a>
        <a href="products/delete/{{encrypt($product->id)}}" class="btn btn-danger">Delete</a>
</td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
