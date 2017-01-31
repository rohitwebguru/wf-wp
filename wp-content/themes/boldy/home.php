<?php get_header(); ?>
	<!-- BEGIN SLIDER -->
<?php if (0): // slider ?>
	  <div id="slider">
	  		<?php if(get_option('boldy_slider')!=''){
			$page_data = get_page(get_option('boldy_slider'));
					$content = $page_data->post_content;
					echo $page_data->post_content;
			}else{?>
				<div style="border:1px solid #ddd; text-align:center; padding:150px 100px 0; height:219px; font-size:14px;">
					This is the slider. In order to have items here you need to create a page in which to insert the images, simply one after another, setting up the link to point at ( if needed ) and text captions in the Title field. Then select the page as the "slider page" in the Theme Options Page. Make sure your images are 960px x 370px.
				</div>
			<?php }?>
		</div>
	   <div style="width:960px; margin:0 auto; background:url(<?php bloginfo('template_directory'); ?>/images/bk_shadow_slider.png) 0 0 no-repeat; height:50px;"></div>
<?php endif; // slider ?>
	   <!-- END SLIDER -->

	   <!-- BEGIN BLURB -->
<?php if (0): // blurb ?>
	   <?php if(get_option('boldy_blurb_enable')=="yes" && get_option('boldy_blurb_text')!=""){ ?>
	   <div id="blurb">
			<p>
			<!--<a href="<?php 
			if(get_option('boldy_blurb_page')!=""){
				echo get_permalink(get_option('boldy_blurb_page'));
			}elseif(get_option('boldy_blurb_link')!=""){
				echo get_option('boldy_blurb_link');
			} ?>"> 
			<img src="<?php bloginfo('template_directory'); ?>/images/but_blurb.png" alt="" />
			</a>-->
			<?php echo get_option('boldy_blurb_text'); ?> 
			</p>
	   </div>
	   <?php }?>
<?php endif; // blurb ?>
	   <!-- END BLURB -->

	   <!-- BEGIN HOME CONTENT -->
	   <!-- begin home boxes -->
<?php 
	$displayBlock = false;
	$box1=get_post(get_option('boldy_home_box1'));
	$box2=get_post(get_option('boldy_home_box2'));
	$box3=get_post(get_option('boldy_home_box3')); 
	if (get_option('boldy_home_box1')!= null && get_option('boldy_home_box2')!= null &&
 		get_option('boldy_home_box3')!= null && $displayBlock):
?>
		<div id="homeBoxes" class="clearfix">

			<div class="homeBox">
				<!-- <h2><?php echo $box1->post_title?></h2> -->
				<?php echo apply_filters('the_content', $box1->post_content);?>
				<!-- <a href="<?php echo get_option('boldy_home_box1_link')?>"><strong>Read more &raquo;</strong></a> -->
			</div>
			<div class="homeBox">
				<!-- <h2><?php echo $box2->post_title?></h2> -->
				<?php echo apply_filters('the_content', $box2->post_content);?>
				<!-- <a href="<?php echo get_option('boldy_home_box2_link')?>"><strong>Read more &raquo;</strong></a> -->
			</div>
			<div class="homeBox last">
				<!-- <h2><?php echo $box3->post_title?></h2> -->
				<?php echo apply_filters('the_content', $box3->post_content);?>
				<!-- <a href="<?php echo get_option('boldy_home_box3_link')?>"><strong>Read more &raquo;</strong></a> -->
			</div>

<?php 
	$homebox=&get_post($dummy_id=61); // display full width content for home page HOME_BODY
	//$homebox=&get_post($dummy_id=737); // display 2010 video archive 
?>
                    <!--<h1><?php echo $homebox->post_title; ?></h1> -->  
                    <div class="homeBoxContent">
                        <?php echo '<p style="height: 25px;" />'.apply_filters('the_content', $homebox->post_content);?>
                    </div>
		</div>
<?php 
	endif; // endif display block
?>
		<!-- end home boxes -->
	   <!-- END HOME CONTENT -->
	   <!-- BEGIN BLOG -->
<?php //$_GET['cat'] = 4; ?>
<?php  if (is_category(get_option('boldy_portfolio')) || post_is_in_descendant_category( get_option('boldy_portfolio'))){?>
<?php include (TEMPLATEPATH . '/portfolio.php'); ?>
<?php } else {?>
		<!-- Begin #colLeft -->
		<div id="colLeft">
		<!-- archive-title -->				
						<?php if(is_month()) { ?>
						<div id="archive-title">
						Browsing articles from "<strong><?php the_time('F, Y') ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_category()) { ?>
						<div id="archive-title">
						Browsing articles in "<strong><?php $current_category = single_cat_title("", true); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_tag()) { ?>
						<div id="archive-title">
						Browsing articles tagged with "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
						<?php if(is_author()) { ?>
						<div id="archive-title">
						Browsing articles by "<strong><?php wp_title('',true,''); ?></strong>"
						</div>
						<?php } ?>
					<!-- /archive-title -->
					
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
		<?php $category = get_the_category(); if ($category[0]->cat_name!='events') continue; ?>
		<!-- Begin .postBox -->
		<div class="postItem">
		
				<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1> 
				<div class="meta">
							<?php the_time('M j, Y') ?> &nbsp;&nbsp;//&nbsp;&nbsp; by <span class="author"><?php the_author_link(); ?></span> &nbsp;&nbsp;//&nbsp;&nbsp;  <?php the_category(', ') ?>  &nbsp;//&nbsp;  <?php comments_popup_link('No Comments', '1 Comment ', '% Comments'); ?> 
						</div>
				<?php the_content(__('Read more >>')); ?> 
				
		</div>
		
		<!-- End .postBox -->
		
		<?php endwhile; ?>

	<?php else : ?>

		<p>Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>
            <!--<div class="navigation">
						<div class="alignleft"><?php next_posts_link() ?></div>
						<div class="alignright"><?php previous_posts_link() ?></div>
			</div>-->
			<?php if (function_exists("emm_paginate")) {
				//emm_paginate();
			} ?>

		</div>
		<!-- End #colLeft -->
	
<?php get_sidebar(); ?>	
<?php }?>           
	   <!-- END BLOG -->
	   
	   <!-- SLIDER SETTINGS -->
	   <script type="text/javascript">
			$(window).load(function() {
				$('#slider').nivoSlider({
					effect:'random', //Specify sets like: 'fold,fade,sliceDown'
					slices:15,
					animSpeed:500,
					pauseTime:8000,
					startSlide:0, //Set starting Slide (0 index)
					directionNav:true, //Next & Prev
					directionNavHide:true, //Only show on hover
					controlNav:true, //1,2,3...
					controlNavThumbs:false, //Use thumbnails for Control Nav
					controlNavThumbsFromRel:false, //Use image rel for thumbs
					controlNavThumbsSearch: '.jpg', //Replace this with...
					controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
					keyboardNav:true, //Use left & right arrows
					pauseOnHover:true, //Stop animation while hovering
					manualAdvance:false, //Force manual transitions
					captionOpacity:0.8, //Universal caption opacity
					beforeChange: function(){},
					afterChange: function(){},
					slideshowEnd: function(){} //Triggers after all slides have been shown
				});
			});
			</script>

<?php
  if (function_exists('add_getsocial_scripts')) {
    add_getsocial_scripts(); echo "getsocial";
    if (function_exists('add_getsocial_box')) {
      add_getsocial_box();
    }
  }
?>

<?php get_footer(); ?>