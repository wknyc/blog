<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle" id="searchresults">Search Results</h2>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Search Results') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Search Results &raquo;') ?></div>
		</div>
			<br />

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>


<?php get_footer(); ?>