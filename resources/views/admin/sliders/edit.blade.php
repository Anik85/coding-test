<x-admin.layouts.admin_master>
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Slider</h1>
        <div class="card-header">
            Edit Slider <a href="{{route('sliders.index')}}" class="btn btn-info">List</a>
        </div>
        <div class="card-body">
        <form action="{{route('sliders.update',['slider'=>$slider->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3 row">
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">slider Name</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputTitle" name="slider_title" value="{{old('slider_title',$slider->slider_title)}}"> 
                </div>
            </div>
            
            <div class="mb-3">
                <label for="inputTitle" class="col-sm-3 col-form-label">picture</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" id="inputTitle" name="slider_image" value="{{old('slider_image',$slider->slider_image)}}">
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