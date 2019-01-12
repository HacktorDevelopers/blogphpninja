	<div class="bg-dark container" style="margin-bottom: 50px; margin-top:0px;">
		<p>Web Stat</p>
		<p class="text-muted">Users <?php echo $this->usermodel->nou()?></p>
		<p class="text-muted">Comments <?php echo $this->commentmodel->nocs()?></p>
		<p class="text-center">All Right Reserved &copy; <?php echo $year ?> PHP Ninja</p>
	</div>
	
	
	
	<nav class="nav nav-pills bg-dark nav-justified fixed-bottom">
		<a class="nav-item nav-link fa fa-info fa-2x" href="<?php echo base_url()?>p/about"></a>
		<a class="nav-item nav-link fa fa-phone fa-2x" href="<?php echo base_url()?>p/contact"></a>
		<a class="nav-item nav-link fa fa-home fa-2x" href="<?php echo site_url()?>"></a>
		<a class="nav-item nav-link fa fa-search fa-2x" data-toggle="modal" data-target="#searchModal" href=""></a>
		<?php if ( ! isset($this->session->user_data) ):?>
			<a class="nav-item nav-link fa fa-sign-in-alt fa-2x" href="<?php echo site_url()?>users/login"></a>
		<?php else:?>
			<a class="nav-item nav-link fa fa-user fa-2x" href="<?php echo site_url()?>users/index"></a>
			<a class="nav-item nav-link fa fa-bell fa-2x" href="<?php echo site_url()?>users/notification"></a><span class="badge badge-primary">5</span>
			<a class="nav-item nav-link fa fa-sign-out-alt fa-2x" href="<?php echo site_url()?>users/logout"></a>
		<?php endif;?>
	</nav>
	
	
	<?php echo script_tag('resources/js/jquery.js')?>
	<?php echo script_tag('resources/js/bootstrap/bootstrap.min.js') ?>
	<?php echo script_tag('resources/js/main.js') ?>
	
</div>
		
			<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="searchModalLabel">Search for post here...</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	 <p>Search by:  
		<select name="searchBy" class="form-control">
			<?php foreach($post_cats as $post_cat): ?>
				<?php echo "<option value='".$post_cat."'>$post_cat</option>"; ?>
			<?php endforeach; ?>
		</select>
	</p>
        <input type="search" name="keyword" class="form-control" placeholder="Start typing..." autofocus/>
	 <ul id="searchResult">
		<li></li>
	</ul>
      </div>
    </div>
  </div>
</div>
	
		
		
	</body>
</html>