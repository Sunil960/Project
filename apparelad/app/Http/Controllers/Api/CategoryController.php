<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Category; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Illuminate\Support\Facades\URL;
class CategoryController extends Controller
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
	
    public function getAllCategories()
	{
		$categories = Category::all();
		if (is_null($categories)) {
            return $this->sendError('Categories not found.');
        }
		foreach($categories as $category){
			$categoryImage['image'] = URL::asset('/public/images/'.$category->image);
			$data[] = array_merge($category->toArray(),$categoryImage);
		}
        return $this->sendResponse($data, 'Categories retrieved successfully.');
	
	}
	
	public function getCategoriesByType(REQUEST $request)
	{
		$categoriesByType = Category::where('name',$request->type)->first();
		if (is_null($categoriesByType)) {
            return $this->sendError('Category not found.');
        }
		$categoryImage['image'] = URL::asset('/public/images/'.$categoriesByType->image);
        return $this->sendResponse(array_merge($categoriesByType->toArray(),$categoryImage), 'Category retrieved successfully.');
	}
}
