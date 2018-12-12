<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('templates'.DIRECTORY_SEPARATOR.'header.php');
// Searching the posts
$p = new PostsDAO();
$posts = $p->listPost();
$_GET['debug'] = "true";
if($_GET['debug'] == "true"){
	$_SESSION['authUser'] == "true";
}
?>
<br>
<br>
<?php if($posts != []){ ?>
	<div class="row" id="home-posts-grid">
		<div class="col s12 l12">
			<div id="main-post" class="col s12 l8 main-post-background" style="background: url('<?php siteURL() ?>/view/library/img/postbackground.jpeg');">
				<div class="mask-img">
					<h2 class="principal-post-title">
						<?php echo $posts[0]['post_name']; ?>
					</h2>		
				</div>
			</div>
			<?php for ($i=1; $i <= 3 ; $i++) { ?>
				<?php if(isset($posts[$i])){ ?>
					<div class="col s12 l4 " id="secundary-post-div-<?php echo $i; ?>">
						<div class="col l6 secundary-post-background" style="background: url('<?php siteURL() ?>/view/library/img/postbackground.jpeg');">
						</div>
						<div class="col s12 l6">
							<?php echo $posts[$i]['post_name']; ?>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');