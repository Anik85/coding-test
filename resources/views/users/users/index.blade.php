<x-admin.layouts.admin_master>
<div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                @if(session('message'))
                    <div class="alert alert_success" id="alert">
                        <span class="close" data-dismiss='alert'></span>
                        <strong style="color: green; padding-left:1rem">{{ session('message') }}</strong>
                    </div>
                @endif
                <table class="table table-hover my-0">
                    <thead>
                    <tr>
                        <th>SL</th>
                        <th class=" d-xl-table-cell">User FirstName</th>
                        <th class=" d-xl-table-cell">User LastName</th>
                        <th class=" d-xl-table-cell">Email</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($users as $key =>$user)
                    <tr>cd 
                        <td>{{$key+1}}</td>
                        <td class=" d-xl-table-cell">{{$user->firstname}}</td>
                        <td class=" d-xl-table-cell">{{$user->lastname}}</td>
                        <td class=" d-xl-table-cell">{{$user->email}}</td>
                        <td>
                            <a href="{{route('users.show',['user'=>$user->id])}}" class="btn btn-info btn-sm">show</a>  | 
                            <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post" class="d-inline">
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