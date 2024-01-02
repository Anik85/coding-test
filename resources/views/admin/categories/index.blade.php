<x-admin.layouts.admin_master>
<div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Create Category</h5>
                    <div class="pull-right">
                        <a href="{{route('categories.create')}}" class="btn btn-info">create</a>
                    </div>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th class=" d-xl-table-cell">Category Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($categories as $key =>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td class=" d-xl-table-cell">{{$category->category_name}}</td>
                        <td>
                            <a href="{{route('categories.show',['category'=>$category->id])}}" class="btn btn-info btn-sm">show</a>  | 
                            <a href="{{route('categories.edit',['category'=>$category->id])}}" class="btn btn-primary btn-sm">Edit</a> |
                            <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post" class="d-inline">
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