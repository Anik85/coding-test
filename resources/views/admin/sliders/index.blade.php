<x-admin.layouts.admin_master>
<div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Create slider</h5>
                    <div class="pull-right">
                        <a href="{{route('sliders.create')}}" class="btn btn-info">create</a>
                    </div>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th class=" d-xl-table-cell">Slider Name</th>
                        <th class=" d-xl-table-cell">Slider Image</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($sliders as $key =>$slider)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td class="d-xl-table-cell">{{$slider->slider_title}}</td>
                        <td><img src="{{asset($slider->slider_image)}}" style="width: 70px; height: 40px;" alt="slider image"></td>
                        <td>
                            <a href="{{route('sliders.show',['slider'=>$slider->id])}}" class="btn btn-info btn-sm">show</a>  | 
                            <a href="{{route('sliders.edit',['slider'=>$slider->id])}}" class="btn btn-primary btn-sm">Edit</a> |
                            <form action="{{route('sliders.destroy',['slider'=>$slider->id])}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete?')">Delete</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-admin.layouts.admin_master>