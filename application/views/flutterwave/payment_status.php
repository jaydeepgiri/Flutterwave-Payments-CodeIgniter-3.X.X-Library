<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Payment Status - Flutter Wave Library for CodeIgniter v3.x.x by Jaydeep Goswami</title>
	
	<meta name="description" content="Payment Status - Flutter Wave Library by Jaydeep Goswami - for CodeIgniter v3.x.x">
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
			<h5>Payment Details</h5>
			<table class='table table-hover table-border table-striped'>
			<?php if($status == 'successful'){?>
				<tr class='bg-success text-light'>
					<th>Payment Status</th>
					<td ><?=$status?></td>
				</tr>
				<tr>
					<th>Transaction ID [Reference No#]</th>
					<td><?=$txn_id;?></td>
				</tr>
				<tr>
					<th>Amount</th>
					<td><?=$amount.''.$currency_code;?></td>
				</tr>
				<tr>
					<th>Customer Email Address</th>
					<td><?=$customer_email;?></td>
				</tr>
				<tr>
					<th>Message</th>
					<td><?=$message;?></td>
				</tr>
				<tr>
					<th>Payment Plan</th>
					<td><?=$payment_plan;?></td>
				</tr>
			<?php }elseif($status == 'cancelled' || $status == 'error' ){?>
				<tr class='bg-danger text-light'>
					<th>Payment Status</th>
					<td><?=$status?></td>
				</tr>
				<tr>
					<th>Message</th>
					<td><?=$message?></td>
				</tr>
				
			<?php }?>
			</table>
			<a class='btn btn-success' href='<?=base_url('flutterwave')?>'>Make another Payment</a>
		</div>
		<div class='col-12 '>
			<hr>
			<h4>Full Response Data Returned >> </h4>
			<hr>
			<pre><?php print_r($full_data);?></pre>
		</div>
	</div>
<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
