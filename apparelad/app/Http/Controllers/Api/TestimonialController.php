<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Testimonial; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Illuminate\Support\Facades\URL;
class TestimonialController extends Controller

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
	
    public function index()

    {
        $testimonial = Testimonial::latest()->limit('3')->get();
		foreach($testimonial as $test){
		 $testimonialImage['testimonial_image'] =  URL::asset('/public/images/'.$test->testimonial_image);
		$data[] = array_merge($test->toArray(),$testimonialImage);
		}
		if($testimonial){
        return $this->sendResponse($data, 'Testimonial retrieved successfully.');
        }else{
		return response()->json(['message'=>'Testimonial not retrieved','status' => '0','error' => 'true']); 
		}

    }

}
