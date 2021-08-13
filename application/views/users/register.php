<?php echo validation_errors() ;?>
<?php echo form_open('users/register'); ?>

<div class="row" style="margin-top: -300px">
	<div class="col-md-4 col-md-offset-4">
		<h2 class="text-center"><?php echo $title ;?></h2>
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" name="name" class="form-control" placeholder="Enter Name">
			</div>
			<div class="form-group">
				<label for="">Zipcode</label>
				<input type="text" name="zipcode" class="form-control" placeholder="Enter Zipcode">
			</div>
			<div class="form-group">
				<label for="">Email</label>
				<input type="email" name="email" class="form-control" placeholder="Enter Email">
			</div>
			<div class="form-group">
				<label for="">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Enter Username">
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter Password">
			</div>
			<div class="form-group">
				<label for="">Confirm Password</label>
				<input type="password" name="password2" class="form-control" placeholder="Confirm Password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
		</div>
</div>
<?php echo form_close() ;?>
