<?php echo validation_errors() ;?>
<?php echo form_open('users/login'); ?>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-center"><?php echo $title ;?></h2>

		<div class="form-group">
			<label for="">Username</label>
			<input type="text" name="username" class="form-control" placeholder="Enter Username" required autofocus>
		</div>
		<div class="form-group">
			<label for="">Password</label>
			<input type="password" name="password" class="form-control" placeholder="Enter Password" required autofocus>
		</div>

		<button type="submit" class="btn btn-primary btn-block">Log In</button>
	</div>
</div>
</divrow>

<?php echo form_close() ;?>
