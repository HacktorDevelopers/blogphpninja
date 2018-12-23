<div class='row'>
<?php
	foreach($this->session->user_data as $key => $val):
		echo "<p class='col-md-6'><span class='badge badge-primary'>".str_replace('_', ' ', ucfirst($key)) ."</span> ".$val."</p>";
	endforeach;
	echo "<a href='".site_url()."user/edit' class='fa fa-edit'>Edit Profile</a>";
?>
</div>