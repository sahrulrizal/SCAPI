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
	<script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>
</head>
<style type="text/css" media="screen">
	body{
		background-color: #EEE;
	}
	#content{
		background-color: #FFF;
		padding: 10px;
	}	
</style>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Simple Souncloud API</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo site_url('admin/users'); ?>">Users</a></li>
        <li><a href="<?php echo site_url('admin/genres'); ?>">Genres</a></li>
        <li><a href="<?php echo site_url('admin/advertisement'); ?>">Advertisement</a></li>
      </ul>
      <?php foreach ($this->m_scapi->getUser($this->session->userdata('id_user')) as $key): ?>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?= $key->name; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('proses/logout'); ?>">Logout</a></li>
          </ul>
        </li>
      </ul>
      <?php endforeach ?>

    </div><!-- /.navbar-collapse -->

  </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
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
		</div>
		<div class="col-md-12">
		<?php if ($this->uri->segment(2) == "users") {
				$this->load->view('admin/users');
			}elseif ($this->uri->segment(2) == "genres") {
				$this->load->view('admin/genres');
			}elseif ($this->uri->segment(2) == "advertisement") {
				$this->load->view('admin/advertisement');
			}else{
				echo "<div class='alert alert-success'>Welcome to Dashboard</div>";
				} ?>
		</div>
	</div>
</div>
<script src="<?= base_url('assets/js/ad_scapi.js');?>"></script>
</body>
</html>