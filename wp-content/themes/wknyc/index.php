<?php get_header(); ?>



	<div id="content">
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<small>&nbsp;// posted by <?php the_author() ?></small>
				<div class="post_date"><?php echo get_the_date("m.d.y"); ?></div><div class="post_hdr_bar"></div> 
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
					 <br clear="all" />
					<?php comments_popup_link('Leave a Comment', 'View Comments', 'View Comments'); ?> &raquo;	
				</div>
				<div class="postmetadata">
					<div class="post_side_link comments_link"><?php comments_popup_link('Leave a Comment', 'View Comments', 'View Comments'); ?> &raquo;</div>
					<div class="post_side_link">
						<div class='shareLink'><a name="fb_share" type="box_count" share_url="<?php the_permalink() ?>"></a></div>
						<div class='shareLink'><a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-count="vertical" data-via="WKNYC">Tweet</a></div>
					</div>
					<br clear='all' />
					<div class="post_side_link"><?php edit_post_link('+ Edit Post', '', '<br /><br />'); ?></div>
					
				</div>
				<br clear='all' />
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
		<br clear='all'>
	</div>

<?php get_footer(); ?>
