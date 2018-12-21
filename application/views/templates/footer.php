	<div class="bg-dark text-center" style="margin-bottom: 50px; margin-top:0px;">
		All Right Reserved &copy; <?php echo $year ?> PHP Ninja
	</div>
	
	
	
	<nav class="nav nav-pills bg-dark nav-justified fixed-bottom">
		<a class="nav-item nav-link fa fa-home fa-2x" href="<?php echo site_url()?>"></a>
		<a class="nav-item nav-link fa fa-user fa-2x" href="<?php echo base_url()?>p/about"></a>
		<a class="nav-item nav-link fa fa-list fa-2x" href="<?php echo base_url()?>p/contact"></a>
		<a class="nav-item nav-link fa fa-search fa-2x" data-toggle="modal" data-target="#searchModal" href=""></a>
		<?php if ( ! isset($this->session->user_online) ):?>
			<a class="nav-item nav-link fa fa-lock fa-2x" href="<?php echo site_url()?>users/login"></a>
		<?php else:?>
			<a class="nav-item nav-link fa fa-profile fa-2x" href=""></a>
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