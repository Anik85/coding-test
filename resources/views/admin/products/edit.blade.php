<x-admin.layouts.admin_master>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Product</h1>
        <div class="card-header">
            Edit product <a href="{{route('products.index')}}" class="btn btn-info">List</a>
        </div>
        <div class="card-body">
        <form action="{{route('products.update',['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="name" value="{{$product->name}}"> 
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="price" value="{{$product->price}}"> 
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="quantity" value="{{$product->quantity}}"> 
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="price" value="{{$product->price}}"> 
                </div>
            </div>
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">
                    Category Id
                </label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-select" aria-label="Category select">
                        <option selected>Open this select menu</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-3">
                <button type="submit" class="btn btn-info">Update</button>
            </div>
        </div>

        </form>
        </div>
    
    </div>
</x-admin.layouts.admin_master>