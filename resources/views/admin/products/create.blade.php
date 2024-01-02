<x-admin.layouts.admin_master>
<div class="container-fluid p-0">
        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
            @csrf
 
            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">
                    Name
                </label>
                <div class="col-sm-9">
                    <input type="text"
                    class="form-control"
                    id="inputTitle"
                    name="name"
                    value="">
                </div>
            </div>
 
            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">
                    Price
                </label>
                <div class="col-sm-9">
                    <input type="text"
                    class="form-control"
                    id="inputTitle"
                    name="price"
                    value="">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputTitle" class="col-sm-3 col-form-label">
                    Quantity
                </label>
                <div class="col-sm-9">
                    <input type="text"
                    class="form-control"
                    id="inputTitle"
                    name="quantity"
                    value="">
                </div>
            </div>
 
            <div class="mb-3 row">
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
 

 
            <div class="mb-3 row">
                <div class="col-sm-9 offset-3">
                    <button type="submit" class="btn btn-info">
                        Submit
                    </button>
                </div>
            </div>
 
        </form>
    </div>
</x-admin.layouts.admin_master>