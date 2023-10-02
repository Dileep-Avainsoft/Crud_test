@include('products.index')
@if($message = Session::get('success'))

    <div class="alert alert-success alert-block"><strong>{{ $message }}</strong></div>

@endif
<div class="container my-3">
    <div class="text-right">
        <a href="{{ '/product' }}" class="btn btn-dark"> View Data</a>
    </div>

    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ old('name') }}">
            @if($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"value="{{ old('email') }}">
            @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">description</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" >{{ old('description') }}</textarea>
            @if($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file"  class="form-control" name="image" id="exampleInputPassword1" value="{{ old('image') }}">
            @if($errors->has('image'))
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
