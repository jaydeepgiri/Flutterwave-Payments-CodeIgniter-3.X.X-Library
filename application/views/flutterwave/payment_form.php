<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Flutter Wave Library for CodeIgniter v3.x.x by Jaydeep Goswami</title>
	
	<meta name="description" content="Flutter Wave Library by Jaydeep Goswami - for CodeIgniter v3.x.x">
	<meta name="author" content="Jaydeep Goswami">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	
	</style>
</head>
<body>

<div class="container">
	<h4>Welcome to Flutter Wave Library for CodeIgniter by Jaydeep Goswami
		<small><a href="https://github.com/jaydeepgiri/Flutterwave-Payments-CodeIgniter-3.X.X-Library" target="_blank">Click here</a></small>
	</h4>
	<div id="row">
		<div id="col-6">
			<p>Basic form to read the pricing and customer details. These details can be sent in any method. <a href="https://developer.flutterwave.com/docs/rave-standard" class='btn btn-link' target="_blank">>> Click here for official documentation <<</a></p>
			<?php if($this->session->flashdata('message')){ ?>
				<div id="flash_message" class='col-md-8 offset-md-2'>
					<p class="alert alert-<?=$this->session->flashdata('message_type');?>"><?=$this->session->flashdata('message');?></p>
				</div>
			<?php } ?>
			<form action='<?=base_url("flutterwave/create_transaction");?>' method='post'>
				<label>Customer Email <span class='text-danger'>*</span></label>
				<input type='text' name='customer_email' class='form-control' required/><br>
				
				<label>Amount <span class='text-danger'>*</span></label>
				<input type='text' name='amount' class='form-control' required/><br>
				
				<label>Currency <span class='text-danger'>*</span></label>
				<input type='text' name='currency' value='NGN' readonly class='form-control'/><br>
				
				<label>Payment Plan ID [ Set your product / plan ID for recurring payments if any ]</label>
				<input type='text' name='payment_plan' value=''  class='form-control'/><br>
				
				<br><br>
				<input type='submit' class='btn btn-success' value='Make payment'/>
				
			</form>
		</div>
	</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
