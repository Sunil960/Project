<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use Validator;

use App\Product;

use App\Category;

use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function index()
    {
		$product = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*','products.id AS pid', 'categories.id', 'categories.name')->get();
        return view('admin.product.product',['title' => 'Product Management'])->with(array('products' => $product));
    }
	
	public function create()
    {
		$category = Category::all();
        return view('admin.product.create',['title' => 'Create Product'])->with(array('categories' => $category));
    }
	
	public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            //'quantity' => 'required',
            //'price' => 'required',
            //'sku' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'front_cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'back_cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'shadow_cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
			
        ]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		$frontImageName = 'front'.str_random(32).'.'.request()->front_cover_image->getClientOriginalExtension();
        request()->front_cover_image->move(public_path('images'), $frontImageName);
		
		$backImageName = 'back'.str_random(32).'.'.request()->back_cover_image->getClientOriginalExtension();
        request()->back_cover_image->move(public_path('images'), $backImageName);
		
		$shadowImageName = 'shadow'.str_random(32).'.'.request()->shadow_cover_image->getClientOriginalExtension();
        request()->shadow_cover_image->move(public_path('images'), $shadowImageName);
		
		$formData = array(
            'product_name' => $request->product_name,
            //'quantity' => $request->quantity,
            //'price' => $request->price,
            //'sku' => $request->sku,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'front_cover_image' => $frontImageName,
            'back_cover_image' => $backImageName,
            'shadow_cover_image' => $shadowImageName
        );
		
		Product::create($formData);
		return redirect('admin/product')->with('status', 'Product Created Successfully!');
    }
	
	public function edit($id)
    {
        $data = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*','products.id AS pid','products.status AS pstatus', 'categories.id', 'categories.name')->where('products.id', $id)->first();
		$category = Category::all();
        return view('admin.product.edit',['title' => 'Edit Product'])->with(array('product' => $data,'categories' => $category));
    }
	
	public function update(Request $request, $id)
    {   
	    $status = '0'; 
		if($request->status == 'on'){
			$status = '1';
		}
		
		$validate = [];
		if($request->has('front_cover_image')) {
			$validate['front_cover_image'] = 'required|image|jpeg,png,jpg,gif,svg|max:2048';
		}
		if($request->has('back_cover_image')) {
			$validate['back_cover_image'] = 'required|image|jpeg,png,jpg,gif,svg|max:2048';
		}
		if($request->has('shadow_cover_image')) {
			$validator['shadow_cover_image'] = 'required|image|jpeg,png,jpg,gif,svg|max:2048';
		}
         $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'description' => 'required'           
			]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		if($request->has('front_cover_image')) {
			$frontImageName = 'front'.str_random(32).'.'.request()->front_cover_image->getClientOriginalExtension();
			request()->front_cover_image->move(public_path('images'), $frontImageName);
		} 
		if($request->has('back_cover_image')) {
			$backImageName = 'back'.str_random(32).'.'.request()->back_cover_image->getClientOriginalExtension();
			request()->back_cover_image->move(public_path('images'), $backImageName);
		} 
		if($request->has('shadow_cover_image')) {
			$shadowImageName = 'shadow'.str_random(32).'.'.request()->shadow_cover_image->getClientOriginalExtension();
			request()->shadow_cover_image->move(public_path('images'), $shadowImageName);
		} 
		
		$Image = [];
		if($request->has('front_cover_image')) {
			$Image['front_cover_image'] = $frontImageName;
		}
		if($request->has('back_cover_image')) {
			$Image['back_cover_image'] = $backImageName;
		}
		if($request->has('shadow_cover_image')) {
			$Image['shadow_cover_image'] = $shadowImageName;
		}
			
		$update = array( 
		    'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'description' => $request->description,
			'status' => $status			 
        );
        $updateForm = array_merge($update,$Image);
		Product::where('id',$id)->update($updateForm);
		return redirect('admin/product')->with('status', 'Product Updated Successfully!');
    }
	
	public function destroy($id)
    {
         Product::where('id',$id)->delete();
		 return redirect('admin/product')->with('status', 'Product Deleted Successfully!');
    }
}