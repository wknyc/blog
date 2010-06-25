
</div>
<div id="footer">

	<div id='footer_inner'>
		<div class='footer_link'>LINKS</div>
		<div class='footer_link'>MAP</div>
		<div class='footer_link'>SEARCH <?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
		<br clear="all" />
	</div>
	<div id='footer_bg'></div>
</div>
<?php
wp_footer();
$themedir = "http://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/wknyc/";
?>

<script src="<?php echo $themedir . 'js/jquery.js'; ?>"></script>
<script src="<?php echo $themedir . 'js/custom_map.js'; ?>"></script>

<script type='text/javascript'>
	
	jQuery(document).ready(function(){
		windowResize();
		setupMaps("<?php echo $themedir; ?>");
	});

	var h;
	function windowResize(){
		h = jQuery(window).height() - 25;
		jQuery("#footer").css("top",(h+"px"));
	}
	jQuery(window).resize(windowResize);
		
</script>


</body>
</html>
