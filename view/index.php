<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('templates'.DIRECTORY_SEPARATOR.'header.php');
// Searching the posts
$p = new PostsDAO();
$result = $p->listPost();
echo "<pre>";
var_dump($result);
echo "</pre>";
?>
<div class="row" id="home-posts-grid">
	<div class="col s12">
		<div class="col s6">

		</div>
		<div class="col s6">
			<div class="col s12">
				
			</div>
			<div class="col s12">
				
			</div>
			<div class="col s12">
				
			</div>
		</div>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');