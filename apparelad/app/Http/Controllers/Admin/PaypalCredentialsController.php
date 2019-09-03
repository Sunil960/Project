<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
 
use Illuminate\Http\Request;

use Validator;

use App\PaypalCredentials;

use Illuminate\Support\Facades\DB;

class PaypalCredentialsController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	 public function index()
    {
		$paypalCredential = PaypalCredentials::all();
        return view('admin.paypal.paypal',['title' => 'Paypal Credentials Management'])->with(array('paypalCredentials' => $paypalCredential));
    }
	
	public function create()
    {
		$paypalCredential = PaypalCredentials::all();
        return view('admin.paypal.create',['title' => 'Create Paypal Credentials'])->with(array('paypalCredentials' => $paypalCredential));
    }
	
	public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'api_username' => 'required',
            'api_password' => 'required',
            'api_signature' => 'required',
            'account_type' => 'required'	
        ]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		
		$formData = array(
            'api_username' => $request->api_username,
            'api_password' => $request->api_password,
            'api_signature' => $request->api_signature,
            'account_type' => $request->account_type
        );
		$getCredential = PaypalCredentials::where('account_type', $request->account_type)->first();
		if($getCredential){
		PaypalCredentials::where('account_type',$request->account_type)->update($formData);	
		}else{
		PaypalCredentials::create($formData);
		}
		return redirect('admin/paypal')->with('status', 'Paypal Credentials Created Successfully!');
    }
	
	public function edit($id)
    {
        $paypalCredential = PaypalCredentials::where('id', $id)->first();
        return view('admin.paypal.edit',['title' => 'Edit Credentials'])->with(array('paypalCredential' => $paypalCredential));
    }
	
	public function update(Request $request, $id)
    {   
	   
         $validator = Validator::make($request->all(), [
            'api_username' => 'required',
            'api_password' => 'required',
            'api_signature' => 'required',           
            'account_type' => 'required'           
			]);
		if ($validator->fails())
		{
			return redirect()->back()->withInput()->withErrors($validator->errors());
		}
		
		$update = array( 
		    'api_username' => $request->api_username,
            'api_password' => $request->api_password,
            'api_signature' => $request->api_signature,
			'account_type' => $request->account_type			 
        );
		$getCredential = PaypalCredentials::where('account_type', $request->account_type)->first();
		if($getCredential){
		PaypalCredentials::where('account_type',$request->account_type)->update($update);	
		}else{
		PaypalCredentials::where('id',$id)->update($update);
		}
		return redirect('admin/paypal')->with('status', 'Credentials Updated Successfully!');
    }
	
	public function destroy($id)
    {
         PaypalCredentials::where('id',$id)->delete();
		 return redirect('admin/paypal')->with('status', 'Credentials Deleted Successfully!');
    }
}