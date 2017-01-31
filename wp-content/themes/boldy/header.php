<?php

$show_event_menu = 0;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="keywords" content="<?php echo get_option('boldy_keywords'); ?>" />

<meta name="description" content="<?php echo get_option('boldy_description'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>

<link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo('template_directory'); ?>/css/ddsmoothmenu.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" rel="stylesheet" type="text/css" />

<link href="<?php bloginfo('template_directory'); ?>/css/nivo-slider.css" rel="stylesheet" type="text/css" />

<link rel="shortcut icon" href="/wfimages/wondereye.ico">

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.4.2.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.form.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/ddsmoothmenu.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.nivo.slider.pack.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/Museo_Slab_500_400.font.js"></script>

<!-- Cufon init -->

	<script type="text/javascript">

		<?php if(get_option('boldy_cufon')!="no"):?>

			//Cufon.replace('h1',{hover: true})('h2',{hover: true})('h3')('.reply',{hover:true})('.more-link');

		 <?php endif ?>

	</script>

	<script type="text/javascript">

		 $(document).ready(function(){

			  $('#quickContactForm').ajaxForm(function(data) {

				 if (data==1){

					 $('#success').fadeIn("slow");

					 $('#bademail').fadeOut("slow");

					 $('#badserver').fadeOut("slow");

					 $('#contact').resetForm();

					 }

				 else if (data==2){

						 $('#badserver').fadeIn("slow");

					  }

				 else if (data==3)

					{

					 $('#bademail').fadeIn("slow");

					}

					});

				 });

		</script>



<style type="text/css">



input.groovybutton

{

   font-size:11px;

   font-family:Tahoma,sans-serif;

   text-align:left;

   color:#FFFFFF;

   width:120px;

   height:26px;

   background-color:#2878C0;

   border-top-style:solid;

   border-top-color:#2878C0;

   border-top-width:1px;

   border-bottom-style:solid;

   border-bottom-color:#2878C0;

   border-bottom-width:1px;

   border-left-style:solid;

   border-left-color:#1858B8;

   border-left-width:6px;

   border-right-style:solid;

   border-right-color:#508CC0;

   border-right-width:6px;

}



</style>



<script language="javascript">



function goLite(FRM,BTN)

{

   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#2888D8";

   window.document.forms[FRM].elements[BTN].style.borderTopColor = "#2888D8";

   window.document.forms[FRM].elements[BTN].style.borderBottomColor = "#2888D8";

   window.document.forms[FRM].elements[BTN].style.borderLeftColor = "#1864D0";

   window.document.forms[FRM].elements[BTN].style.borderRightColor = "#58A4E0";

}



function goDim(FRM,BTN)

{

   window.document.forms[FRM].elements[BTN].style.backgroundColor = "#2878C0";

   window.document.forms[FRM].elements[BTN].style.borderTopColor = "#2878C0";

   window.document.forms[FRM].elements[BTN].style.borderBottomColor = "#2878C0";

   window.document.forms[FRM].elements[BTN].style.borderLeftColor = "#1858B8";

   window.document.forms[FRM].elements[BTN].style.borderRightColor = "#508CC0";

}



</script>



<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>

	<?php //comments_popup_script(); // off by default ?>

	<?php wp_head(); ?>

</head>
<body <?php if(is_home()){

				echo 'id="home"';

			}elseif(is_category(get_option('boldy_portfolio')) || post_is_in_descendant_category( get_option('boldy_portfolio')) && !is_single()){

				echo 'id="portfolio"';

			}?>>

<!-- BEGINN MAINWRAPPER -->

<div id="mainWrapper">

	<!-- BEGIN WRAPPER -->

    <div id="wrapper">

		<!-- BEGIN HEADER -->

        <div id="header">

            <div id="logo"><a href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_option('boldy_logo_img'); ?>" alt="<?php echo get_option('boldy_logo_alt'); ?>" /></a></div>

			<!-- BEGIN MAIN MENU -->

			<?php if ( function_exists( 'wp_nav_menu' ) ){

					wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'mainMenu', 'container_class' => 'ddsmoothmenu', 'fallback_cb'=>'primarymenu') );

				}else{

					primarymenu();

			}?>

            <!-- END MAIN MENU -->

			<!-- BEGIN TOP SEARCH -->

			<div id="topSearch">

				<form id="searchform" action="<?php bloginfo('url'); ?>/" method="get">

					<input type="submit" value="" id="searchsubmit"/>

					<input type="text" id="s" name="s" value="type your search" />

				</form>

			</div>

			<!-- END TOP SEARCH -->

			<!-- BEGIN TOP SOCIAL LINKS -->

			<div id="topMission"><strong><em>
Wonderfest's Mission is to inspire and nurture a deep sense of wonder about the world. We aspire to stimulate curiosity, promote careful reasoning, challenge unexamined beliefs, and encourage life-long learning. We achieve these ends through public science gatherings in the San Francisco Bay Area and through online science discourse & video that reach around the world.
			</em></strong></div>
			<div id="topSocial">

				<ul>

					<?php if(get_option('boldy_linkedin_link')!=""){ ?>

					<li><a href="<?php echo get_option('boldy_linkedin_link'); ?>" class="linkedin" title="Join us on LinkedIn!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_linkedin.png" alt="LinkedIn" /></a></li>

					<?php }?>

					<?php if(get_option('boldy_twitter_user')!=""){ ?>

					<li><a href="http://www.twitter.com/<?php echo get_option('boldy_twitter_user'); ?>" class="twitter" title="Follow Us on Twitter!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_twitter.png" alt="Follow Us on Twitter!" /></a></li>

					<?php }?>

					<?php if(get_option('boldy_facebook_link')!=""){ ?>

					<li><a href="<?php echo get_option('boldy_facebook_link'); ?>" class="twitter" title="Join Us on Facebook!"><img src="<?php bloginfo('template_directory'); ?>/images/ico_facebook.png" alt="Join Us on Facebook!" /></a></li>

					<?php }?>

					<li><a href="<?php bloginfo('rss2_url'); ?>" title="RSS" class="rss"><img src="<?php bloginfo('template_directory'); ?>/images/ico_rss.png" alt="Subcribe to Our RSS Feed" /></a></li>

				</ul>

			</div>	

			<!-- END TOP SOCIAL LINKS -->

        </div>

        <!-- END HEADER -->

		

		<!-- BEGIN CONTENT -->

		<div id="content">
