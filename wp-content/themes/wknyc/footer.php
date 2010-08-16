
</div>
<div id="footer">

	<div id='footer_inner'>
		<!-- <div class='footer_link'>LINKS</div>
		<div class='footer_link'>MAP</div> -->
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

<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<script type='text/javascript'>
	
	jQuery(document).ready(function(){
		windowResize();

		//If we have any maps on this page, set them up
		if(mapObjects.length > 0) setupMaps("<?php echo $themedir; ?>");

		//fix fb buttons
		setTimeout('fixFBbuttons()', 2000) ;
	});
	
	//window resizing
	var h;
	function windowResize(){
		h = jQuery(window).height() - 25;
		jQuery("#footer").css("top",(h+"px"));
	}
	jQuery(window).resize(windowResize);

	function fixFBbuttons(){
		var disp = '';
		$(".fb_share_no_count").each(function(){
			disp = $(this).css("display");
			if( disp == "none") {
				$(this).css("display", "block");
				$(this).children(".fb_share_count_inner").html("0");
			}
		});
	}

	
	if ($.browser.webkit) {
	    $("#searchform").css("margin-top", "-16px");
	    $(".post_date").css("line-height", ".9em");
	}

	
</script>
	
	
</body>
</html>
