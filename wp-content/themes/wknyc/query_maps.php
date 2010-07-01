<?php



$querystr = "
    SELECT wposts.* 
    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
    WHERE wposts.ID = wpostmeta.post_id 
    AND wpostmeta.meta_key = 'tag' 
    AND wpostmeta.meta_value = 'email' 
    AND wposts.post_type = 'post' 
    ORDER BY wposts.post_date DESC
 ";

 $pageposts = $wpdb->get_results($querystr, OBJECT);
 
 
 ?>

<?php

	//query_posts("date_range=1&start_date=2009-02-02&end_date=2010-03-01&order=ASC");

	//The Loop
	if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

	<?php 
	endwhile; else:
	
	endif;
	
	//Reset Query
	wp_reset_query();

?>
