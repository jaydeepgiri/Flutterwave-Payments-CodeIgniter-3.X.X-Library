# Flutterwave-Payments-CodeIgniter-3.X.X-Library
Simple / Easy to integrate Flutterwave Payment methods into CodeIgniter Application. Including the Sample Payment Forms, Payment Status Page and a ready set Webhook. 


## Installation

1. Copy all the files from folders inside `application` folder to `your_ci_project/application/`
2. Go to `your_ci_project/application/config/flutterwave.php`

```php
/* Configuration stars from here */
// Flutter Wave Credentials - Atleast Public Key and Secret are required for payment gateway to work.
$config['PBFPubKey'] = ($config['sandbox']) ? 'TEST_PUBLIC_KEY' : 'LIVE_PUBLIC_KEY'; /* Public Key for Sandbox : Live */
$config['SECKEY'] = ($config['sandbox']) ? 'TEST_SECRET_KEY' : 'LIVE_SECRET_KEY'; /* Secret Key for Sandbox : Live */

$config['encryption_key'] = ($config['sandbox']) ? 'TEST_ENCRYPTION_KEY' : 'LIVE_ENCRYPTION_KEY'; /* Encryption Key for Sandbox : Live */

// Webhook Secret Hash 
$config['secret_hash'] = ($config['sandbox']) ? 'TEST_SECRET_HASH' : 'LIVE_SECRET_HASH$'; /* Secret HASH for Sandbox : Live */

// What is the default currency?
// $config['currency'] = 'USD';  /* Store Currency Code */
$config['currency'] = 'NGN';  /* Store Currency Code */

// Transaction Prefix if any
$config['txn_prefix'] = 'TXN_PREFIX';  /* Transaction ID Prefix if any */

```

That's all. Now you are ready to start accepting your payments through Flutterwave.

## How to use predefined library functions?
```php
$this->load->library('flutterwave_lib'); /* must load this library before using any predefined function */
```

__1. create_payment() :__
```php

$data = array(
	'amount'=>1000,
	'customer_email' => 'customer@gmail.com',
	'redirect_url' => base_url("flutterwave/payment_status/"),
	'payment_plan'=>'your_plan_id_if_any'
);
$response = $this->flutterwave_lib->create_payment($data);
if(!empty($response) || $response != ''){
	$response = json_decode($response,1);
	if(isset($response['status']) && $response['status'] == 'success'){
		redirect($response['data']['link']);
	}else{
		echo 'API returned error >> '.$response['message'];
	}
}
```
__2. verify_transaction($reference)__
```php
$params = $this->input->get(); /* read the params when returned from flutterwave payment back to your site */
$reference = $params['txref'];
$response = $this->flutterwave_lib->verify_transaction($reference);

if(!empty($response)){
	$response = json_decode($response,1);
	if($response['status'] == 'success' &&
		isset($response['data']['chargecode']) &&
		( $response['data']['chargecode'] == '00' || $response['data']['chargecode'] == '0') ){
		/* 
		Perform Database Operations here 
		Add your custom code here for any other operation like 
		selling good / inserting / update transaction 
		record in database / anything else
			Or 
		to make the payment system more secure you can 
		make use of Webhook for one extra layer of security.  
		*/
	}elseif( (isset($params['cancelled']) && $params['cancelled'] == true)){
		
		echo "Payment Cancelled by you or some other reasons. Try again!";
		
	}elseif( $response['status'] == 'error'){
		echo "API returned error >> ".$response['message'];
		
	}
}else{
	echo "No data returned from Server!";
}
```
## How to use webhook()?
There is one ready to use `webhook()` method available in `Flutterwave` controller. It will receive the Flutterwave response, $_SERVER variable response and simply insert the record in the log file and not in database, If you set this `webhook()` URL into your flutterwave dashboard. 

For example, If you are using the same `webhook()` provided here, which is in `application/controller/Flutterwave.php` > `webhook()` 
then set this `yourwebapp.com/flutterwave/webhook/` as webhook URL in Flutterwave dashboard.

[ __Note:__ Given webhook will only store the response in log files and will not perform any of the database operations. ]

Refer to comments given in the `webhook()` function of `Flutterwave` controller to make changes as per your needs. 

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/README.md)
