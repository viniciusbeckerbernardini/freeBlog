<?php
// Requesting the config file
require_once('..'.DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('templates'.DIRECTORY_SEPARATOR.'header.php');
// Searching the posts
$p = new PostsDAO();
$posts = $p->listPost();
?>
<br>
<br>
<div class="row" id="home-posts-grid">
	<div class="col s12">
		<div id="main-post" class="col s8 main-post-background" style="background: url('<?php siteURL() ?>/view/library/img/postbackground.jpeg');">
			<div class="mask-img">
				<h2 class="principal-post-title">
					<?php echo $posts[0]['post_name']; ?>
				</h2>		
			</div>
		</div>
		<?php for ($i=1; $i <= 3 ; $i++) { ?>
			<?php if(isset($posts[$i])){ ?>
				<div class="col s4">
					<div class="col s4 secundary-post-background" style="background: url('<?php siteURL() ?>/view/library/img/postbackground.jpeg');">
					</div>
					<div class="col s8">
						<?php echo $posts[$i]['post_name']; ?>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');