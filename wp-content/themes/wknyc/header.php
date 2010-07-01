<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<?php 

//define('WP_HOME', 'http://'.$_SERVER['HTTP_HOST'].'');
//define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'');
define('WP_HOME', 'http://blog.wknyc.com');
define('WP_SITEURL', 'http://blog.wknyc.com');
$themedir = "http://" . $_SERVER['HTTP_HOST'] . "/wp-content/themes/wknyc/";
?>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { } ?> <?php wp_title(); ?></title>
<meta name="description" content="The official blog of Wieden+Kennedy New York. Written by the good people of W+K NYC.">

<!-- link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" /-->

<link rel="stylesheet" href="<?php echo($themedir . "style.css"); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript"> var mapObjects = [];</script>
<style type="text/css" media="screen">
	body{ background-image:url(<?php echo($themedir . "/images/blogpattern.gif"); ?>); }
</style>



<?php wp_head(); ?>




</head>
<body>
<div id='top_strip'></div>
<div id="container">
<div id='time_div'><?php echo strtoupper(date("D F d Y"));?></div>
<a href="<?php bloginfo('rss2_url'); ?>" ><img id='rssicon' src='<?php echo($themedir . "/images/rss.gif"); ?>' /></a>


<div id="header">

	<!-- h1><a href="<?php /*echo get_option('home'); */?>/"><?php /*bloginfo('name');*/ ?></a></h1-->
	<h1><a href="<?php echo get_option('home'); ?>/"><img id='headerimg' src="<?php echo $themedir . '/images/header.jpg'; ?>"/></a></h1>

</div>