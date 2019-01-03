<?php
// Requesting the config file
require_once('inc'.DIRECTORY_SEPARATOR.'config.php');
// Requesting the header file
require_once('templates'.DIRECTORY_SEPARATOR.'header.php');
// Searching the posts
$p = new PostsDAO();
$posts = $p->listPost();
$pj = new ProjectsDAO();
$projects = $pj->listProject();
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
<div class="row">
	<h2 class="title center">Projetos</h2>
	<br>
	<div class="col s12">	
		<div id="homeMosaic" data-max-row-height="500" data-refit-on-resize="1" data-refit-on-resize-relay="0" data-default-aspect-ratio="0.5" data-max-row-height-policy="crop" data-high-res-images-width-threshold="850" data-responsive-width-threshold="500">
			<?php 	foreach ($projects as $project) {
				echo '<img src="'.$project['project_featuredphoto'].'">';
			} ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col s12">	
		<a class="btn waves-effect waves-light right" href="#">+projetos</a>
	</div>
</div>
<?php 
// Requesting the footer file
require_once('templates'.DIRECTORY_SEPARATOR.'footer.php');