<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use App\Paypal;
use Bluesnap\Plan;
use Bluesnap\Adapter;
use Bluesnap\Vendor;
use Bluesnap\Subscription;
use Bluesnap\VaultedShopper;
use Illuminate\Support\Facades\URL;
class BluesnapController extends Controller
{
     public function __construct()
    {
        $environment = 'sandbox'; // or 'production'
        \Bluesnap\Bluesnap::init($environment, 'API_1562062009016145226123', 'APIs@123');
    }
	
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
			'error' => true
        ];

        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);

    }
	
	public function createTransaction()
    {
		
        $response = \Bluesnap\CardTransaction::create([
            'creditCard' => [
                'cardNumber' => '4263982640269299',
                'expirationMonth' => '02',
                'expirationYear' => '2023',
                'securityCode' => '837'
            ],
            'amount' => 10.00,
            'currency' => 'USD',
            'recurringTransaction' => 'ECOMMERCE',
            'cardTransactionType' => 'AUTH_CAPTURE',
        ]);
        if ($response->failed())
        {
            $error = $response->data;
			return $this->sendError($error,'Transaction Not Completed.');
            // handle error
        }
        $transaction = $response->data;
		 return $this->sendResponse($transaction, 'Transaction Completed Successfully.');
        //return $transaction;
    }
	
	public function createPlan()
	{
		
	}
	
	public function createSubscription()
	{
	$subsDetails = array( 'chargeFrequency' => 'DAILY',
	                       'name' => 'Apperalad Membership Plan',
	                       'currency' => 'USD',
	                       'maxNumberOfCharges' => 12,
	                       'recurringChargeAmount' => 11,
	                       'payerZipCode' => 54321,
	                       'payerEmail' => 'testing2017users@gmail.com',
	                       'payerFirstName' => 'Test',
	                       'payerLastName' => 'User',
	                       'payerPhone' => 998834433,
	                       'cardExpirationYear' => 2022,
	                       'cardSecurityCode' => 111,
	                       'cardExpirationMonth' => '07',
	                       'cardNumber' => 4111111111111111,
						   
	 
	 );
    $createPlan = \Bluesnap\Plan::create([
			"chargeFrequency" => $subsDetails['chargeFrequency'],
			"gracePeriodMinutes" => 10,
			//"trialPeriodDays" => 14,
			//"initialChargeAmount" => 2,
			"name" => $subsDetails['name'],
			"currency" => $subsDetails['currency'],
			//"maxNumberOfCharges" => $subsDetails['maxNumberOfCharges'],
			"recurringChargeAmount" => $subsDetails['recurringChargeAmount'],
			//"chargeOnPlanSwitch" => true
		]);
		
		if ($createPlan->failed())
        {
            $error = $createPlan->data;
			return $this->sendError($error,'Plan Not Created.');
        }	 
		
	$createSubsription = \Bluesnap\Subscription::create([
		"payerInfo" => [
			"zip" => $subsDetails['payerZipCode'],
			"email" => $subsDetails['payerEmail'],
			"firstName" => $subsDetails['payerFirstName'],
			"lastName" => $subsDetails['payerLastName'],
			"phone" => $subsDetails['payerPhone']
		],
		"paymentSource" => [
			"creditCardInfo" => [
				"creditCard" => [
					"expirationYear" => $subsDetails['cardExpirationYear'],
					"securityCode" => $subsDetails['cardSecurityCode'],
					"expirationMonth" => $subsDetails['cardExpirationMonth'],
					"cardNumber" => $subsDetails['cardNumber']
				]
			]
		],
		"planId" => $createPlan->data->id,
		"nextChargeDate" => "2019-07-05"
	]);	
    if ($createSubsription->failed())
        {
            $error = $createSubsription->data;
			return $this->sendError($error,'Subscription Not Created.');
        }
		$plan = $createPlan->data;
        $createSubsriptionPlan = $createSubsription->data;
		$getSubsription = \Bluesnap\Subscription::get($createSubsription->data->id);
		$getSubsriptionResult = $getSubsription->data;
		$paymentData = array(
		     'payment_id' => $getSubsriptionResult->subscriptionId,
		     'payment_method' => 'bluesnap',
		     'payer_email' => $getSubsriptionResult->payerInfo->email,
		     'payer_first_name' => $getSubsriptionResult->payerInfo->firstName,
		     'payer_last_name' => $getSubsriptionResult->payerInfo->lastName,
		     'payer_id' => $getSubsriptionResult->vaultedShopperId,
		     'total' => $getSubsriptionResult->recurringChargeAmount,
		     'total_currency' => $getSubsriptionResult->currency,
		);
		Paypal::create($paymentData);
		return $this->sendResponse($getSubsriptionResult, 'Subscription Created Successfully.');
   }
   
   public function getSpecificSubscription($id)
   {
	   $getSubsription = \Bluesnap\Subscription::get($id);
	    if ($getSubsription->failed())
        {
            $error = $getSubsription->data;
			return $this->sendError($error,'Subscription Not Retrieved.');
        }
		
        $getSubsriptionResult = $getSubsription->data;
		return $this->sendResponse($getSubsriptionResult, 'Subscription Retrieved Successfully.');
   }
   
   public function getVaultedUser($id)
   {
	   $getUser = \Bluesnap\VaultedShopper::get($id);
	    if ($getUser->failed())
        {
            $error = $getUser->data;
			return $this->sendError($error,'VaultedUser Not Retrieved.');
        }
		
        $getUserResult = $getUser->data;
		return $this->sendResponse($getUserResult, 'VaultedUser Retrieved Successfully.');
   }
   
   public function cancelSubscription($id)
   {
	   $cancelSubscription = \Bluesnap\Subscription::update($id,["status" => "CANCELED"]);
	    if ($cancelSubscription->failed())
        {
            $error = $cancelSubscription->data;
			return $this->sendError($error,'Subscription Not Cancelled.');
        }
		
        $cancelSubscriptionResult = $cancelSubscription->data;
		return $this->sendResponse($cancelSubscriptionResult, 'Subscription Cancelled Successfully.');
   }

  
}