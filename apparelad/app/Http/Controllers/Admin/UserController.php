<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use Validator;

use App\User;

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	private static $role = 'customer';
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function index()
    {
		$user = User::where('role', 'customer')->get();
        return view('admin.user.user',['title' => 'User Management'])->with(array('users' => $user));
    }
	
	public function create()
    {
        return view('admin.user.create',['title' => 'Add User']);
    }
	
	  public function store(Request $request)
    {
		$input = $request->all();  
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required'
			
        ]);
        if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		$form_data = array(
		    'first_name' => $input['first_name'],
		    'last_name' => $input['last_name'],
		    'email' => $input['email'],
			'password' => bcrypt($input['password']),
			'role'  => self::$role,
			'token' => str_random(32)
        );
		User::create($form_data);
		return redirect('admin/user')->with('status', 'User Created Successfully!');
    }
	
	public function edit($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.user.edit',['title' => 'Edit User'])->with(array('user' => $data));
    }
	
	public function update(Request $request, $id)
    {   

        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
            
           
        ]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		$update = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        );
		
        User::where('id',$id)->update($update);
		return redirect('admin/user')->with('status', 'User Updated Successfully!');
    }
	
	public function destroy($id)
    {
         User::where('id',$id)->delete();
		 return redirect('admin/user')->with('status', 'User Deleted Successfully!');
    }
}