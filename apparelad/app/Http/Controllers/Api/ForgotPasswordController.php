<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Category; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
class ForgotPasswordController extends Controller
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
    
	public function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
    }

    public function forgotPassword(Request $request)
    {
         $input = $request->all();
		 $getUser = User::where(array('email' => $input['email']))->first();	
			if($getUser)
			{
				
			   $data['password'] = $this->randomPassword();
			   $data['email'] = $input['email'];
			   $data['name'] = $getUser->first_name;
			   $data['id'] = base64_encode($getUser->id);
			   
					Mail::send('emails.forgot', $data, function($message) use($data){
			 
						$message->to($data['email'], $data['email'])
			 
								->subject('Password Reset');
					});
			
					if (Mail::failures()) {
					   return response()->json(['message' => 'Mail Not Sent','status' => '0','error' => 'true']);
					 }else{
						 
					   User::where('email',$input['email'])->update(['password' => bcrypt($data['password'])]);
					   
					   return response()->json(['message' => 'Mail Sent Successfully','status' => '1','error' => 'false']);
					 }
			
			} else { 
			return response()->json(['message' => 'User Not Exists','status' => '0','error' => 'true']); 
		    } 
    }
	function resetPassword(Request $request)
	{
		 $input = $request->all();
		 $getUser = User::where(array('email' => $input['email']))->first();	
			if($getUser){
			   $validator = Validator::make($input, [
					'email' => 'required',
					'password' => 'required'
            ]);
 
			if($validator->fails()){
				return $this->sendError('Validation Error.', $validator->errors());       
			}
             
			User::where('email',$input['email'])->update(['password' => bcrypt($input['password'])]);
			return response()->json(['message' => 'Password Reset Successfully','status' => '1','error' => 'false']);
        
			}else{
			return response()->json(['message' => 'User Not Exists','status' => '0','error' => 'true']); 	
			}
	}
	
}
