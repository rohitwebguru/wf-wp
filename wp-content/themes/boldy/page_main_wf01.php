<?php
/*
Template Name: Home 1
*/
?>
<?php get_header(); ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=219348434765750";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div style="width: 100%">
	<div id="main-feature-block" style="width: 700px; height: 350px; float: left;border: 0px solid red; background-color: #333">
	  <?php if (1): ?>
	  <?php echo do_shortcode('[nivoslider order=DESC slug="main"]'); ?>
	  <?php endif; ?>
	</div>
	<div id="main-sidebar-block" style="float: right;height: 350px; width: 256px;border: 0px solid green; background-color: #333">
		<?php include("home_topsidebar.php"); ?>
	</div>
</div>
<div id="sub-feature-block" style="float: left;border: 0px solid blue;width: 960px; margin-top: 5px">
	<?php //if ( function_exists( 'get_placid_slider_category' ) ) {  get_placid_slider_category('radicalphysics'); } ?>
    <?php if ( function_exists( 'get_placid_slider' ) ) { get_placid_slider('2'); } ?>
</div>
<div id="widget-section" style="float: left;border: 0px solid red;width: 958px; margin-top: 0px">
	<div style="float: left;border: 0px solid blue;width: 310px; margin-top: 0px;padding-right: 10px">
		<?php include("home_sidebar1.php"); ?>
	</div>
	<div style="float: left;border: 0px solid blue;width: 302px; margin-top: 0px;padding-right: 10px">
		<?php include("home_sidebar2.php"); ?>
	</div>
	<div style="float: left;border: 0px solid blue;width: 320px; margin-top: 0px">
		<?php include("home_sidebar3.php"); ?>
	</div>
</div>
<?php if (0): ?>
<div style="float: left;border: 1px solid blue;width: 100%; margin-top: 5px;">
	<div id="content" class="widecolumn">
	 <?php if (have_posts()) : while (have_posts()) : the_post();?>
	 <div class="post">
		 <!-- <h2 id="post-<?php the_ID(); ?>"><?php the_title();?></h2> -->
		 <div class="entrytext">
		  <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		 </div>
	 </div>
	 <?php endwhile; endif; ?>
	 <?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
	<div id="main">
	EXT
	</div>
</div>
<?php endif; ?>
<?php get_footer(); ?>