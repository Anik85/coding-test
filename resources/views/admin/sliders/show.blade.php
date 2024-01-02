<x-admin.layouts.admin_master>
<div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    show Slider <a href="{{route('sliders.index')}}" class="btn btn-info">List</a>
                </div>
                <h2>Title: <span class="text-info ms-4">{{$slider->slider_title}}</span> </h2>
                <h2>Image <img src="{{asset($slider->slider_image)}}" class="ms-3" width="300px" height="200px" alt=""></h2>

                    
            </div>
        </div>

    </div>
</x-admin.layouts.admin_master>