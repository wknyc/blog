<?php
/*
Template Name: Projects Template
*/
?>

<?php get_header(); ?>

	<div id="content">
	<h2>Projects</h2>
	<div id='page_description'>Here's what we're building at the moment. Older works are in the archive.</div>
	
	<?php  
		
		$id = get_cat_id('projects');
		$query= 'cat=' . $id;
		query_posts($query);
	
	?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post project" id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php 
					$postImage = get_post_meta(get_the_ID(), 'project_image', true);
					if($postImage != ""){
						$imageStr = "<a href='". get_permalink() ."'><img class='excerpt_image' src='".$postImage."' /></a>";
						echo($imageStr);
					}
					the_excerpt();
					echo("<a href='".get_permalink()."'>View Project...</a>");
					
					
					?>
				</div>

				<p class="postmetadata"><?php if (function_exists('the_tags')) { the_tags('Tags: ', ', ', '<br/>'); } ?><?php edit_post_link('Edit', '', ''); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>