<x-admin.layouts.admin_master>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Category</h1>
        <div class="card-header">
            Edit category <a href="{{route('categories.index')}}" class="btn btn-info">List</a>
        </div>
        <div class="card-body">
        <form action="{{route('categories.update',['category'=>$category->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Category</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="category_name" value="{{old('category_name',$category->category_name)}}"> 
                </div>
            </div>
            
            

        </div>

        <div class="mb-3 row">
            <div class="col-sm-9 offset-3">
                <button type="submit" class="btn btn-info">submit</button>
            </div>
        </div>

        </form>
        </div>
    
    </div>
</x-admin.layouts.admin_master>