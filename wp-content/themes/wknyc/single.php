<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- div class="navigation">
			<div class="alignleft"><?php /*previous_post_link('&laquo; %link')*/ ?></div>
			<div class="alignright"><?php /*next_post_link('%link &raquo;')*/ ?></div>
		</div -->

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>
			<div id='posttime'><?php the_time('l, F jS, Y') ?></div>
			<?php 
				// Signup Form
				$categoryArray = get_the_category();
				$themedir = "http://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/moontemplate/";
				if($categoryArray[0]->cat_name == "Talks"){
					echo "<div id='class_signup'><span id='signup_form'>enter your email here <input></input></span> <a href=''>Sign me up!</a></div>";
					echo "<script type='text/javascript' src='" . $themedir . "js/jquery.js'></script>";
					echo "<script type='text/javascript' src='" . $themedir . "js/signupform.js'></script>";
				}
				
			?>
			
			
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php 
				if($categoryArray[0]->cat_name == "Projects"){
					echo "<strong>Ingredients</strong>";
					include("components/tech_icons.php");
				}
				?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				
				
			</div>
		</div>

	<?php comments_template(); ?>
	<div id='postfooter'>&laquo; Back to <?php the_category(', ') ?></div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>
