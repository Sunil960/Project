<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\Contact; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Mail;
use Illuminate\Support\Facades\Hash;
class ContactController extends Controller
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
    
    public function sendContactMail(Request $request)
    {
         $input = $request->all();
		 
			   $data = array('name' => $input['name'],
			                 'email' => $input['email'],
			                 'comments' => $input['comments']
			            );
			  
					Mail::send('emails.contact', $data, function($message) use($data){
			 
						$message->to('testing2017users@gmail.com', $data['email'])
			 
								->subject('Contact Message');
					});
			
					if (Mail::failures()) {
					   return response()->json(['message' => 'Mail Not Sent.Please try again','status' => '0','error' => 'true']);
					 }else{
						$contactData = array(
							 'name' => $input['name'],
							 'email' => $input['email'],
							 'comments' => $input['comments'],
						);
					   Contact::create($contactData);
					   
					   return response()->json(['message' => 'Mail Sent Successfully','status' => '1','error' => 'false']);
					 }
			
	}
	
}
