<div class="container">

	<form method="POST" class="form" action="<?php echo site_url()?>users/login">
		<h3>Register Here</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" class="form-control" name="first_name" placeholder="First Name"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" class="form-control" name="last_name" placeholder="Last Name"/>
				</div>
			</div>
		</div>
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" class="form-control" name="email" placeholder="E-mail"/>
			</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="gender">Gender</label>
					<select class="form-control" name="gender">
						<?foreach( $genders as $gender):?>
							<option value="<?php echo strtolower($gender)?>"><?php echo ucfirst($gender)?></option>
						<?php endforeach;?>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="last_name">Role</label>
					<input type="text" class="form-control" name="role" value="member" placeholder="Last Name" disabled/>
				</div>
			</div>
		</div>
			<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password" placeholder="Password"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="confirn_password">Confirm Password</label>
					<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password"/>
					<input type="hidden" class="form-control" value="<?php echo random_string('numeric', 10)?>" name="user_id" placeholder="Confirm Password"/>
				</div>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="register" value="Register"/>
		</div>
		
		<div class="form-group">
			<p>I have an account? <a href="<?php echo site_url()?>users/login">Login</a></p>
		</div>
	</form>

</div>

<div style="margin-top: 50px;">