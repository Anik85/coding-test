<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Image;
use App\Notifications\WelcomeMailNotification;

class ProductController extends Controller
{
    
    public function index()
    {
        $products=Product::all();
        return view('admin.products.index',compact('products'));
    }
    public function create()
    {
        $categories=Category::latest()->get();
        return view('admin.products.create',compact('categories'));
        
    }
    public function store(Request $request)
    {
        $product=Product::create([
           'category_id'=>$request->category_id, 
           'name'=>$request->name, 
           'price'=>$request->price,
           'quantity'=>$request->quantity,
           'created_at'=>Carbon::now(),

        ]);
        // ProductPurchased::dispatch($product);

        $product->notify(new WelcomeMailNotification());

        event(new ProductPurchased($product));

        
        return redirect()->route('products.index');
    }
    public function purchaseProduct(Request $request, $productId)
{
    // Your purchase logic...

    $product = Product::find($productId);

    // Trigger the ProductPurchased event
    event(new ProductPurchased($product));

    // Redirect or return a response
    return redirect()->route('products.index');
}
    public function show(Product $product)
    {
        return view('admin.products.show',[
            'product'=>$product
        ]);
    }
    public function edit(Product $product)
    {
        $categories=Category::latest()->get();
        return view('admin.products.edit',['product'=>$product],compact('categories'));


        // return view('admin.products.edit',[
        //     'product'=>$product
        // ],compact('brands','categories','activeVendor'));
    }
    public function update(Request $request, Product $product)
    {
        $product->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id
        ]);
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status'=>0]);
        return redirect()->route('products.index');
    }
    public function ProductActive($id)
    {
        Product::findOrFail($id)->update(['status'=>1]);
        return redirect()->route('products.index');
    }
    public function ProductSearch(Request $request){
        $data=Product::where('product_name','like','%'.$request->input('search').'%')->get();
        return view('frontend.searchproduct',['products'=>$data]);

    }

    
}