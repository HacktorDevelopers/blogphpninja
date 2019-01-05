<div class='container'>
<center style="background-image: url('<?php echo site_url()?>resources/images/logo.png')" id="cover_picture">
<?php
	echo img('resources/images/profile.png', '','class="profile_picture" id="profile_picture"');
	echo br();
?>
<a class='btn btn-primary'>Change Profile Picture</a>&nbsp;&nbsp;<a class='btn btn-primary'>Change Cover Photo</a>
</center>
<?php
//var_dump($this->session->user_data);


	if( $this->session->flashdata('msg') != NULL ):
		echo "<div class='alert alert-".$this->session->flashdata('flag')."'>";
			echo $this->session->flashdata('msg');
		echo "</div>";
	endif;


?>
<?php
echo form_fieldset('Basic Information', array('color' => 'blue'));
	foreach($this->session->user_data as $key => $val):
		if ( $key != 'id' && $key != 'password'):
			echo "<p class='col-md-6' style='font-size: 20px'><span class='badge badge-primary'>".str_replace('_', ' ', ucwords($key)) ."</span> ".$val."</p>";
		endif;
	endforeach;
echo form_fieldset_close();
	echo "<a href='".site_url()."users/edit'> <span class='fa fa-edit'></span>". nbs(3) ."Edit Profile</a>";
?>
</div>
	
<div style="margin-top:100px">

</div>