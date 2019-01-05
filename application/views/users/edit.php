<?php //var_dump($userdata)?>
<div class="container">

	<form method="POST" class="form" action="<?php echo site_url()?>users/update_profile">
		<h3>Edit Profile</h3>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input type="text" class="form-control" name="first_name" value="<?php echo $userdata->first_name?>" placeholder="First Name"/>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input type="text" class="form-control" name="last_name" value="<?php echo $userdata->last_name?>" placeholder="Last Name"/>
				</div>
			</div>
		</div>
			<div class="form-group">
				<label>E-mail</label>
				<input type="email" class="form-control" name="email" value="<?php echo $userdata->email?>" placeholder="E-mail"/>
				<input type="hidden" value="<?php echo $userdata->user_id?>" name="user_id"/>
			</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="update" value="Update"/>
		</div>
		
	</form>

</div>

<div style="margin-top: 50px;">