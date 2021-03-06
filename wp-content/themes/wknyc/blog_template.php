<?php
/*
Template Name: Blog Template
*/
?>

<?php get_header(); ?>

	<div id="content">
	<h2>Blog</h2>
	<div id='page_description'>Things happen really, really fast these days. This is where we blog the future as it<br />whizzes by our window.</div>
	<?php
		$idProjects = get_cat_id('projects');
		$idGetInvolved = get_cat_id('talks');
		$query= 'cat=-' . $idProjects . ",-" . $idGetInvolved; // EXCLUDE projects!
		query_posts($query); 
	?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata"><?php if (function_exists('the_tags')) { the_tags('Tags: ', ', ', '<br/>'); } ?><?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
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