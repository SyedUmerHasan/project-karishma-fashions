<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\CategoryName;
use App\Products;
use Illuminate\Support\Facades\Input;
use Validator;
use File;
use App\ProductImage;

class ProductAdminController extends Controller
{
    public function CreateProducts()
    {
        $user_id = Auth::id();
        $categories = CategoryName::all();
        $products = Products::all();
        return view('admin.admin_pages.create_products')->with(compact('categories'));
    }
    public function AddProducts(Request $request)
    {
        if ($request->isMethod('post')) {
            // dd($request->all());
            
            $user_id = Auth::id();
            $product = new Products();
            $product->user_id = $user_id;
            $product->category_id = $request->ProductCategory;
            $product->review_id = '1';
            $product->product_name = $request->ProductName;
            $product->product_status = $request->ProductStatus;
            $product->product_code = $request->ProductCode;
            $product->product_description = $request->ProductDescription;
            $product->product_color = $request->ProductColor;
            $product->product_price = $request->ProductPrice;
            $product->product_discounted_price = $request->ProductDiscountedPrice;
            $product->product_size = $request->ProductSize;
            $product->save();
            $ProductId = $product->product_id;
            
            // abort('ishahsabjhbdsajhbs');
            return redirect("/admin/EditProduct/". $ProductId);
        } else {
            return 'This is Add Product Get Method use Post methpod to add the products';
        }
    }
    public function EditProduct($ProductId)
    {
        $myproduct = Products::where('product_id',$ProductId)->first();
        return view('admin.admin_pages.edit_products')->with(compact('myproduct'));
    }
    public function ListProducts()
    {
        return view('admin.admin_pages.list_products');
    }
    public function GetListProducts()
    {
        $products = Products::select('product_name', 'product_price', 'product_status', 'product_quantity', 'product_id')->get();
        // return Datatables::of($users)->make();
        $start = (int)Input::get("start");
        $length = ((int)Input::get("length") > 0 ? (int)Input::get("length") : 11);

        $product = [];
        foreach($products as $item)
        {
            $product[]= [
            $item->product_name,
            $item->product_price,
            (($item->product_status% 2 == 1 )? '<button type="button" class="btn mr-1 mb-1 btn-success btn-sm"> Active</button>': '<button type="button" class="btn mr-1 mb-1 btn-danger btn-sm">Deactive</button>' ),
            $item->product_quantity,
                "<a href=".url("admin/EditProduct/$item->product_id")." class='btn mr-1 mb-1 btn-info btn-sm'> Edit</a><button type='button' class='btn mr-1 mb-1 btn-danger btn-sm'> Delete</button>" 
            ];

        }

        $data = array();
        $data['start'] = Input::get("start");
        $data['length'] = Input::get("length");
        $data['draw'] = 1;
        $data['recordsTotal'] = count($product);
        $data['recordsFiltered']  = count($product);
        $data['data'] = $product;
        $data = json_encode($data);
        //  dd($data);
        return $data;

    }
    
}
