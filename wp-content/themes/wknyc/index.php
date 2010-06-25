<?php get_header(); ?>

	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<small>&nbsp;// posted by <?php the_author() ?></small>
				<div id="post_date"><?php echo get_the_date("m.d.y"); ?></div><div id="post_hdr_bar"></div> 
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
					
					
					<?php 
						$mapData = get_post_meta(get_the_ID(), "_mapp_pois", true);
						if($mapData){
							//draw map!
							
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
									//console.log(mapObject);
								
								mapObjects.push(mapObject);
							</script>
					
					<?php
						}
					 ?> 
				<br>
				<br>
				<br>
						
				</div>
				<div class="postmetadata">
					<?php edit_post_link('Edit', '', '<br />'); ?>
					<?php comments_popup_link('Comment;', 'View Comments', 'View Comments'); ?><br />
					Share / Save
					
				</div>
				<br clear='all' />
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

<?php get_footer(); ?>