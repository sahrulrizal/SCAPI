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
	<link rel="stylesheet" href="<?= base_url('assets/css/scapi.css');?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/APlayer.min.css');?>">
	<script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
	<script src="<?= base_url('assets/js/angular.min.js');?>"></script>
</head>
<body>
	<div id="bg-top">
		<header>
			<div id="logo">
				<a href="#/" title="Home"><img src="<?= base_url('assets/img/sc-logo.svg');?>" alt="Homepage"></a></div>
			<!-- <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div> -->
		</header>
		<nav id="main-nav">
		</nav>
		<section>
			<div class="container">
				<div class="section-all">
					<div class="form-cari" id="cari">
						<p style="font-size:20px;color:#FFF;">Search title, artist, album</p>
						<input type="text" id="searchn" class="btn-search" placeholder="Search title, artist, album">
					</div>
				</div>
			</div>
		</section>
	</div>

	<div ng-view></div>
	<div class="footer-play-music">
		<div id="player1" class="aplayer"></div>
	</div>
	<script src="<?= base_url('assets/js/APlayer.min.js');?>"></script>	
	<script type="text/javascript" src="<?=base_url();?>assets/js/angular-route.min.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/app.js"></script>
	<script type="text/javascript" src="<?=base_url();?>assets/js/controller.js"></script>
	<script src="<?= base_url('assets/js/menu-scapi.js');?>"></script>
	<script src="<?= base_url('assets/js/scapi.js');?>"></script>
</body>
</html>