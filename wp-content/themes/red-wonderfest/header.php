<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php
if(function_exists('language_attributes')) { 
	language_attributes();
}else{
	echo "<h1>Oops:</h1><font color=\"red\">This theme only works with WordPress 2.3 or later. You seem to have an <b>outdated version</b> of WordPress. Please upgrade to <a href=\"http://wordpress.org\">a newer version</a> to use this theme.  (or, if anything, to get the latest security patches!)</font>";
//	exit();
}
?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_single() || is_home() || is_page() || is_archive()) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title('&minus;',true); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />

<!-- It would be a good idea to fill these in! -->
<meta name="keywords" content="" />

<meta name="DC.title" content="<?php if (is_single() || is_home() || is_page() || is_archive()) { ?><?php bloginfo('name'); ?> <?php } ?><?php wp_title('&minus;',true); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php if ( function_exists('wp_list_comments') ) { if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); } ?>
<?php wp_head(); ?>
<!--[if lt IE 7.]>
    <style>#rssbar form{padding:4px 0 0 0x;margin:0;}</style>
<![endif]-->
</head>
<body>
<div id="wrap">
	<div id="rssbar">
        <div style="float:left;"><form id="searchform" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="text" value="Search this website..." name="s" id="s" onfocus="if (this.value == 'Search this website...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search this website...';}" />
		<input id="sbutt" value="GO" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/go.png" /></form></div>
        <span style="float:right;"><a href="<?php bloginfo('rss_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.png" alt="Subscribe to <?php bloginfo('name'); ?>" /></a>
        <a href="<?php bloginfo('comments_rss2_url'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/comments-rss.png" alt="Subscribe to <?php bloginfo('name'); ?>'s comments" /></a></span>
	</div>
<div id="header"><h1><a href="<?php echo get_option('home'); ?>/"><?php /*bloginfo('name').*/ bloginfo('description'); ?></a></h1><h3><?php /*bloginfo('description');*/ ?></h3></div>
