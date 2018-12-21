	<div class="bg-dark text-center fixed-bottom" style="margin-bottom: 40px; margin-top:40px;">
		lorem ipsum &copy; <?php echo $year ?> PHP Ninja
	</div>
	
	
	
	<nav class="nav nav-pills bg-dark nav-justified fixed-bottom">
		<a class="nav-item nav-link active fa fa-home fa-2x" href="<?php echo site_url()?>"></a>
		<a class="nav-item nav-link fa fa-user fa-2x" href="<?php echo base_url()?>p/about"></a>
		<a class="nav-item nav-link fa fa-list fa-2x" href="<?php echo base_url()?>p/contact"></a>
		<a class="nav-item nav-link fa fa-search fa-2x" data-toggle="modal" data-target="#searchModal" href=""></a>
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