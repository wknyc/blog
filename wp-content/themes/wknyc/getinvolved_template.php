<?php
/*
Template Name: Get Involved Template
*/
?>

<?php get_header(); ?>

	<div id="content">
	<h2>Get Involved</h2>
	<div id='page_description'>THING offers an always-available curriculum of courses in a wide range of topics. Using our form, simply submit a request for one of the courses and we'll go from there. Every course will result in you actually making something, however large or small, by the end of the class.</div>
	
	<?php  
		
		$id = get_cat_id('talks');
		$query= 'cat=' . $id;
		query_posts($query . "&order=ASC");
		$postNum = 0;
	?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<?php $postNum++; ?>
			<div class="post project" id="post-<?php the_ID(); ?>">
				
				<h3 class='getinvolved'>Class <?php echo $postNum?>: <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php 
					$postImage = get_post_meta(get_the_ID(), 'project_image', true);
					if($postImage != ""){
						$imageStr = "<a href='". get_permalink() ."'><img class='excerpt_image' src='".$postImage."' /></a>";
						echo($imageStr);
					}
					the_excerpt();
					echo("<a href='".get_permalink()."'>View Class Details...</a>");
					
					
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