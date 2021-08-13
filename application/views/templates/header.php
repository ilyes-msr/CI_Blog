<html>
	<head>
		<title>ciBlog</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@3.4.1/cosmo/bootstrap.min.css" integrity="sha384-6SQbkR6/v7QGEoFg1os3KF4uJMFxP6vxm6vLCSbbwwHllJdb4FqkWMiYLtHWGGN4" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

		<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

	</head>
	<body>

	<nav class="navbar navbar-inverse">
		<div class="container" style="max-width: 1000px">
			<div class="navbar-header">
				<a href="<?php echo base_url()?>" class="navbar-brand">ciBlog</a>
			</div>
			<div id="navbar">
				<ul class="nav navbar-nav" style="font-size: large">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li><a href="<?php echo base_url()?>posts">Blog</a></li>
					<li><a href="<?php echo base_url()?>categories">Categories</a></li>
					<li><a href="<?php echo base_url()?>about">About</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" style="font-size: large">
					<?php if(!$this->session->has_userdata('logged_in')) : ?>
					<li><a href="<?php echo base_url()?>users/register" id="register-link"><span class="glyphicon glyphicon-user"></span> &nbsp; Register</a></li>
					<li><a href="<?php echo base_url()?>users/login"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;  Login</a></li>
					<?php else : ?>
					<li><a href="<?php echo base_url()?>posts/create"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Write Post</a></li>
					<li><a href="<?php echo base_url()?>categories/create"><span class="glyphicon glyphicon-plus"></span> &nbsp; Add Category</a></li>
					<li><a href="<?php echo base_url()?>users/logout"><i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp;  Logout</a></li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container" style="max-width: 900px">
		<div class="alerts-container" style="max-width: 300px; margin: auto; text-align: center">

		<?php if($this->session->flashdata('user_registered')) : ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_registered') . '</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')) : ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_created') . '</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')) : ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_updated') . '</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('category_updated')) : ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('category_updated') . '</p>'; ?>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')) : ?>
			<?php echo '<p class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_logged_in')) : ?>
			<?php echo  '<p class="alert alert-success">' . $this->session->flashdata('user_logged_in') . '</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('wrong_credientials')) : ?>
			<?php echo '<p class="alert alert-danger">' . $this->session->flashdata('wrong_credientials') . '</p>'; ?>
		<?php endif; ?>
		<?php if($this->session->flashdata('user_logged_out')) : ?>
			<?php echo '<p class="alert alert-warning">' . $this->session->flashdata('user_logged_out') . '</p>'; ?>
		<?php endif; ?>
		</div>

		<script type="application/javascript">
			/** After window Load */
			$(window).bind("load", function() {
				window.setTimeout(function() {
					$(".alert").fadeTo(500, 0).slideUp(500, function(){
						$(this).remove();
					});
				}, 3000);
			});
		</script>
