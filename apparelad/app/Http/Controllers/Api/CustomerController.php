<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Category; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Illuminate\Support\Facades\Crypt;
class CustomerController extends Controller
{
	private static $role = 'customer';
	
	public function register(Request $request) 
	{    
		$validator = Validator::make($request->all(), [ 
			'email' => 'required|email|unique:users'
		]);   
		if ($validator->fails()) 			
		{   
			return response()->json(['message'=>$validator->errors()->first(), 'status' => '0', 'error'=>'true']); 		
		}   
		
		$input = $request->all();  
		$input['password'] = bcrypt($input['password']);
		$input['role']  = self::$role; 
		$input['token'] = str_random(32);
		$user = User::create($input);
		return response()->json(['message' => 'User Register Successfully', 'status' => '1', 'paid' => "0", 'id' => Crypt::encrypt($user->id),'email' => $user->email, 'token' => $user->token, 'first_name' => $user->first_name, 'last_name' => $user->last_name, 'error' => 'false']); 
	}
    public function login()
	{ 
		if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
		{	
			$user = Auth::user();		
		    $token = str_random(32);
			
			User::where('id', $user->id)->update(['token' => $token]);			
			return response()->json(['message' => 'User login Successfully', 'status' => '1', 'paid' => $user->paid, 'id' => Crypt::encrypt($user->id), 'email' => $user->email, 'token' => $token, 'first_name' => $user->first_name, 'last_name' => $user->last_name,'error'=>'false']); 
		} else { 
			return response()->json(['message'=>'These credentials do not match our records.','status'=>'0','error'=>'true']); 
		} 
	}
		
	public function index()
	{
		$customers = User::where('role', 'customer')->get();
		$response = [
            'success' => true,
            'data'    => $customers,
            'message' => 'Customers retrieved successfully',
        ];
        return response()->json($response, 200);
	}
	
	public function updateProfile(Request $request,$id)
	
	{
		$input = $request->all();
		if($request->has('password')) {
			$validator['password'] = 'required';
		}
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
            //'password' => 'required'
        ]);
        
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
		   
		    $user = Auth::user();

			$getUser = User::where(array('id'=> Crypt::decrypt($id),'token' => $input['token']))->first();	
			if($getUser)
			{
			$password = [];
			if(!empty($request->password)) {
				$password['password'] = bcrypt($request->password);
			}
		    $update = array(
             'first_name' => $request->first_name,
             'last_name' => $request->last_name,
             'email' => $request->email
            );
			 $updateForm = array_merge($update, $password);
			
			 User::where('id', Crypt::decrypt($id))->where('token',$request->token)->update($updateForm);
			 
            return response()->json(['message' => 'User Profile Updated Successfully', 'status' => '1','first_name' => $request->first_name, 'last_name' => $request->last_name,'token' => $request->token,'error' =>'false']); 
			} else { 
			return response()->json(['message'=>'Profile not updated','status' => '0','error' => 'true']); 
		} 
		
	}
	
	public function getProfileById($id, $token)
	{  
		    //$input = $request->all();
		    
		    $getUser = User::where(array('id'=> Crypt::decrypt($id),'token' => $token))->first();	
			if($getUser)
			{
			return response()->json(['message' => 'User Profile Retrieved Successfully', 'status' => '1','error' => 'false','data' => $getUser]); 
			} else { 
			return response()->json(['message'=>'Profile Not Retrieved','status' => '0','error' => 'true']); 
		 } 
	     
	}

	
	
	public function logout(Request $request)
	{
		$input = $request->all();
		$getUser = User::where(array('id'=> Crypt::decrypt($input['id']),'token' => $input['token']))->first();
		if($getUser)
		{
			$update = array('token' => 'NULL');
			User::where('id', Crypt::decrypt($id))->where('token',$request->token)->update($update);
            	
			return response()->json(['message' => 'User Logout Successfully', 'status' => '1','token' => $request->token,'error' =>'false']); 
		} else { 
			return response()->json(['message'=>'User not Exists','status' => '0','error' => 'true']); 
		} 
	}
	
}
