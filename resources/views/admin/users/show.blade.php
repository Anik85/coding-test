<x-admin.layouts.admin_master>
<div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    show User <a href="{{route('brands.index')}}" class="btn btn-info">List</a>
                </div>
                <h2>Name: <span class="text-info ms-4">{{$user->name}}</span> </h2>
                <h2>UserName: <span class="text-info ms-4">{{$user->username}}</span> </h2>
                <h2>Email: <span class="text-info ms-4">{{$user->email}}</span> </h2>

                    
            </div>
        </div>

    </div>
</x-admin.layouts.admin_master>