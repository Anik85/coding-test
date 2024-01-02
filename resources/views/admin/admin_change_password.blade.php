<x-admin.layouts.admin_master>
    <main class="content">
        <div class="container-fluid p-0">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Admin Profile</div>
            <div class="breadcrumb-title pe-3">Change Password</div>

            <div class="ms-auto">

            </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
            <div class="main-body">
            <div class="row">
            <div class="col-lg-4">
            <div class="card">
            <div class="card-body">
            @php 
                $id= Auth::user()->id;
                $adminData=App\Models\User::find($id);
                @endphp
            <div class="d-flex flex-column align-items-center text-center"><img src="{{(!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin Photo" class="img-fluid rounded-circle mb-2"  />
            <div class="mt-3">
            <h4></h4>
            <p class="text-secondary mb-1"></p>
            <p class="text-muted font-size-sm"></p>

            </div>
            </div>
            <hr class="my-4" />
            <ul class="list-group list-group-flush">


            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><svg xmlns="http://w...content-available-to-author-only...3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
            <span class="text-secondary">codervent</span>
            </li>
            </ul>
            </div>
            </div>
            </div>
            <div class="col-lg-8">
            <div class="card">
            <div class="card-body">
            <form method="post" action="{{route('update.password')}}" enctype="multipart/form-data" >
                @csrf
                @if(session('status'))
                <div class="alert alert-success text-success" role="alert">
                    {{session('status')}}
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger text-danger" role="alert">
                    {{session('error')}}
                </div>
                @endif

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Old Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="password" name="old_password" class="form-control" @error('old_password') is_invalid @enderror id="current_password" placeholder="old password"/>
                    @error('old_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">New Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="password" name="new_password" @error('new_password') is_invalid @enderror class="form-control" id="new_password" placeholder="New password"/>
                    @error('new_password')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Confirm New Password</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation" placeholder="Confirm New password"/>
                </div>
            </div>



            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-success px-4" value="Save Changes" />
                </div>
            </div>

            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
    </main>



</x-admin.layouts.admin_master>
