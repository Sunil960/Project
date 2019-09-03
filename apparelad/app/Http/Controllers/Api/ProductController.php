<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Product; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Illuminate\Support\Facades\URL;
class ProductController extends Controller

{

	public function sendResponse($result, $message)
    {
    	$response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
			'error' => 'false'
        ];

        return response()->json($response, 200);
    }
	
    public function sendError($error, $errorMessages = [], $code = 404)
    {
    	$response = [
            'success' => false,
            'message' => $error,
			'error' => 'true'
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);

    }
    public function index()
    {   
	   
        $products = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name AS category_name')->get();
		
		if (is_null($products)) {
            return $this->sendError('Products not found.');
        }
		foreach($products as $product){
			$frontImage['front_cover_image'] =  URL::asset('/public/images/'.$product->front_cover_image);
			$backImage['back_cover_image'] =  URL::asset('/public/images/'.$product->back_cover_image);
			$shadowImage['shadow_cover_image'] =  URL::asset('/public/images/'.$product->shadow_cover_image);
			$data[] = array_merge($product->toArray(),$frontImage,$backImage,$shadowImage);
		}
        return $this->sendResponse($data, 'Products retrieved successfully.');

    }


    public function store(Request $request)
    {
		
        $input = $request->all();
		
        $validator = Validator::make($input, [

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


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
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
		
        $product = Product::create($formData);
        $frontImage['front_cover_image'] =  URL::asset('/public/images/'.$product->front_cover_image);
	    $backImage['back_cover_image'] =  URL::asset('/public/images/'.$product->back_cover_image);
		$shadowImage['shadow_cover_image'] =  URL::asset('/public/images/'.$product->shadow_cover_image);
		
        return $this->sendResponse(array_merge($product->toArray(),$frontImage,$backImage,$shadowImage), 'Product created successfully.');

    }

    public function show($id)
    {

        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name AS category_name')->where('products.id', $id)->first();
		
		if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
		
		$frontImage['front_cover_image'] = URL::asset('/public/images/'.$product->front_cover_image);
		$backImage['back_cover_image'] = URL::asset('/public/images/'.$product->back_cover_image);
		$shadowImage['shadow_cover_image'] = URL::asset('/public/images/'.$product->shadow_cover_image);
		
        return $this->sendResponse(array_merge($product->toArray(),$frontImage,$backImage,$shadowImage), 'Product retrieved successfully.');

    }


    public function update(Request $request, Product $product)
    {
       
        $input = $request->all();
		
        $validator = Validator::make($input, [

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
 
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $frontImageName = 'front'.str_random(32).'.'.request()->front_cover_image->getClientOriginalExtension();
        request()->front_cover_image->move(public_path('images'), $frontImageName);
		
		$backImageName = 'back'.str_random(32).'.'.request()->back_cover_image->getClientOriginalExtension();
        request()->back_cover_image->move(public_path('images'), $backImageName);
		
		$shadowImageName = 'shadow'.str_random(32).'.'.request()->shadow_cover_image->getClientOriginalExtension();
        request()->shadow_cover_image->move(public_path('images'), $shadowImageName);
		
        $product->product_name = $input['product_name'];

       // $product->quantity = $input['quantity'];
		
        //$product->price = $input['price'];
		
       // $product->sku = $input['sku'];
	   
        $product->category_id = $input['category_id'];
		
        $product->description = $input['description'];
		
        $product->front_cover_image = $frontImageName;
		
        $product->back_cover_image = $backImageName;
		
        $product->shadow_cover_image = $shadowImageName;

        $product->save();

        $frontImage['front_cover_image'] =  URL::asset('/public/images/'.$product->front_cover_image);
	    $backImage['back_cover_image'] =  URL::asset('/public/images/'.$product->back_cover_image);
		$shadowImage['shadow_cover_image'] =  URL::asset('/public/images/'.$product->shadow_cover_image);
		
        return $this->sendResponse(array_merge($product->toArray(),$frontImage,$backImage,$shadowImage), 'Product updated successfully.');

    }

    public function destroy(Product $product)

    {

        $product->delete();
        $frontImage['front_cover_image'] =  URL::asset('/public/images/'.$product->front_cover_image);
	    $backImage['back_cover_image'] =  URL::asset('/public/images/'.$product->back_cover_image);
		$shadowImage['shadow_cover_image'] =  URL::asset('/public/images/'.$product->shadow_cover_image);
		
        return $this->sendResponse(array_merge($product->toArray(),$frontImage,$backImage,$shadowImage), 'Product Deleted successfully.');

    }
	public function getProductByCategory($name)
    {
		if($name == 'All'){
		$product = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name AS category_name')->get();
		}else{
		
        //$input = $request->all();
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.*', 'categories.name AS category_name')->where('categories.name', $name )->get();
		}
		if (is_null($product)) {

            return $this->sendError('Product not found.');

        }
		$data = array();
		foreach($product as $prod){
			$frontImage['front_cover_image'] =  URL::asset('/public/images/'.$prod->front_cover_image);
			$backImage['back_cover_image'] =  URL::asset('/public/images/'.$prod->back_cover_image);
			$shadowImage['shadow_cover_image'] =  URL::asset('/public/images/'.$prod->shadow_cover_image);
			$data[] = array_merge($prod->toArray(),$frontImage,$backImage,$shadowImage);
		}
        return $this->sendResponse($data, 'Product retrieved successfully.');

    }
	
	

}
