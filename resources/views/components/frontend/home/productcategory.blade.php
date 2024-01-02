@php
    $products= App\Models\Product::orderBy('id','ASC')->limit(5)->get();

@endphp

<!-- Section-->
<section class="py-5">
            <div class="container px-4 px-lg-3 mt-5">
                <div class="row gx-3 gx-lg-4 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    <!-- Product price-->
                                    TK {{$product->price}}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{route('product.purchase',$product->id)}}">purchase</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

                </div>
            </div>
        </section>