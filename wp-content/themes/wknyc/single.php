<?php get_header(); ?>

	<div id="content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post singlepost" id="post-<?php the_ID(); ?>">
			<small>&nbsp;// posted by <?php the_author() ?></small>
			<div id="post_date"><?php echo get_the_date("m.d.y"); ?></div><div id="post_hdr_bar"></div> 
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
			<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					
					<?php 
						$mapData = get_post_meta(get_the_ID(), "_mapp_pois", true);
						if($mapData){
							$corrected_address = $mapData[0]["corrected_address"];
							$caption = $mapData[0]["caption"];
							$body = $mapData[0]["body"];
							$lat = $mapData[0]["lat"];
							$lon = $mapData[0]["lng"];
					?>
						<div class='mapDivContainer'><div class='mapDiv' id='map-<?php the_ID(); ?>'></div></div>
						<script type="text/javascript">
							var mapObject = {};
								mapObject.address = "<?php echo $corrected_address; ?>";
								mapObject.caption = "<?php echo $caption; ?>";
								mapObject.body = "<?php echo $body; ?>";
								mapObject.lat = <?php echo $lat; ?>;
								mapObject.lon = <?php echo $lon; ?>;
								mapObject.divID = "map-"+<?php the_ID(); ?>;
							mapObjects.push(mapObject);
						</script>
					
					<?php
						}
					 ?> 
						
				</div>
				<div class="postmetadata">
					<div class="post_side_link"><?php comments_popup_link('Leave a Comment', 'View Comments', 'View Comments'); ?></div>
					<div class="post_side_link"><fb:like href="<?php echo rawurlencode(get_permalink($post->ID)); ?>" layout="button_count" width="100"></fb:like></div>
					<div class="post_side_link"><?php edit_post_link('+ Edit Post', '', '<br />'); ?></div>
				</div>
			<br clear='all' />
		</div>

	<?php comments_template(); ?>
	<div id='postfooter'><a href="<?php echo get_option('home'); ?>">&laquo; Back Home</a></div>
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
	

<?php get_footer(); ?>
