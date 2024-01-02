<x-admin.layouts.admin_master>
    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Products</h5>
                </div>
                <div class="pull-right">
                    <a class="btn btn-info ms-4" href="{{route('products.create')}}">Add New Product</a>
                    <li class="breadcrumb-item active d-inline" aria-current="page">Number of product
                    <span class="badge rounded-pill bg-danger">{{count($products)}}</span>
                    </li>
                </div>
                
                
                <table class="table table-hover my-0">
                    <thead>
                        
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th class="d-xl-table-cell">price</th>
                        <th class="d-xl-table-cell">Quantity</th>
                        <th class="d-xl-table-cell">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key =>$product)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="d-xl-table-cell">{{$product->name}}</td>
                            <td class="d-xl-table-cell">{{$product->price}}</td>
                            <td class="d-xl-table-cell">{{$product->quantity}}</td>
                            <td><a class="btn btn-info btn-sm" href="{{route('products.show',['product'=>$product->id])}}">Show</a>
                            <a class="btn btn-info btn-sm" href="{{route('products.edit',['product'=>$product->id])}}">Edit</a>
                            <form style="display: inline" action="{{route('products.destroy',['product'=>$product->id])}}" method="post">
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