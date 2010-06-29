
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

		//setup maps
		if(mapObjects.length > 0) setupMaps("<?php echo $themedir; ?>");

	});
	
	//window resizing
	var h;
	function windowResize(){
		h = jQuery(window).height() - 25;
		jQuery("#footer").css("top",(h+"px"));
	}
	jQuery(window).resize(windowResize);
		
</script>

    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({appId: '130800890284028', status: true, cookie: true, xfbml: true});
      };
      (function() {
        var e = document.createElement('script');
        e.type = 'text/javascript';
        e.src = document.location.protocol +
          '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
      }());
    </script>

</body>
</html>
