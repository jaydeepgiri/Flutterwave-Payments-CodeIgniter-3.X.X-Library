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

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library/blob/master/README.md)
