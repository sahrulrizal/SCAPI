<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="scapi">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
	<title><?=$title?></title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css');?>">
	<script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
</head>
<style type="text/css" media="screen">
	body{
		background-color: #EEE;
	}
	.body{
		margin:150px auto;
		width: 50%;
		color: #555;
	}
	.head-title{
		width: 100%;
		padding: 10px;
		background-color: #555;
		color: #FFF;
	}
	form{
		background-color: #FFF;
		padding: 10px;
	}
	input[type='text'], input[type='password']{
		padding: 10px;
		border:solid 1px #EEE;
		width: 100%;	
	}
	input[name='sub']{
		width: 100%;
		border-radius: 2px;
	}
</style>
<body>
	<div class="container">
		<div class="body">
		<?php if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          <?php echo $this->session->flashdata('error'); ?>
        </div>  
        <?php }elseif ($this->session->flashdata('success')) {?>
        <div class="alert alert-success" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Success:</span>
          <?php echo $this->session->flashdata('success'); ?>
        </div>  
        <?php } ?>
		<div class="head-title">Login</div>	
		<form action="<?= site_url('proses/pro_login')?>" method="post" accept-charset="utf-8">		
			<p>
				<label for="username">Username :</label>
				<input type="text" name="username" placeholder="Enter your username !">
			</p>
			<p>
				<label for="password">Password :</label>
				<input type="password" name="password" placeholder="Enter your password !">
			</p>
			<p>
				<input type="submit" class="btn btn-success" name="sub" value="Sign In">
			</p>
		</form>
		</div>
	</div>
</body>
</html>