<x-admin.layouts.admin_master>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Brand</h1>
        <div class="card-header">
            Edit Brand <a href="{{route('brands.index')}}" class="btn btn-info">List</a>
        </div>
        <div class="card-body">
        <form action="{{route('brands.update',['brand'=>$brand->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">Brand</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="brand_name" value="{{old('brand_name',$brand->brand_name)}}"> 
                </div>
            </div>
            
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">picture</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="inputTitle" name="brand_image" value="{{old('brand_image',$brand->brand_image)}}">
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