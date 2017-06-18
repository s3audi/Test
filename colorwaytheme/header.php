<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;
            wp_title('|', true, 'right');
            // Add the blog name.
            bloginfo('name');
            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && ( is_home() || is_front_page() ))
                echo " | $site_description";
            // Add a page number if necessary:
            if ($paged >= 2 || $page >= 2)
                echo ' | ' . sprintf(__('Page %s', 'cloriato'), max($paged, $page));
            ?>
        </title>
        <?php if (is_front_page()) { ?>
            <?php if (get_option('colorway_keyword') != '') { ?>
                <meta name="keywords" content="<?php echo get_option('colorway_keyword'); ?>" />
            <?php } else {
                
            } ?>
            <?php if (get_option('colorway_description') != '') { ?>
                 
            <?php } else {
                
            } ?>
            <?php if (get_option('colorway_author') != '') { ?>
                <meta name="author" content="<?php echo get_option('colorway_author'); ?>" />
            <?php } else {
                
            } ?>
        <?php } ?>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php
        /* We add some JavaScript to pages with the comment form
         * to support sites with threaded comments (when in use).
         */
        if (is_singular() && get_option('thread_comments'))
            wp_enqueue_script('comment-reply');
        /* Always have wp_head() just before the closing </head>
         * tag of your theme, or you will break many plugins, which
         * generally use this hook to add elements to <head> such
         * as styles, scripts, and meta tags.
         */
        wp_head();
        ?>
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
        <!--[if gte IE 9]>
        <script type="text/javascript">
        Cufon.set('engine', 'canvas');
        </script>
        <![endif]-->
    </head>
    <body background="<?php
        if (get_option('inkthemes_bodybg') != '') {
            echo get_option('inkthemes_bodybg');
        } else {
            ?>
              <?php bloginfo('template_url'); ?>/images/body-bg.png
          <?php } ?>" <?php body_class(); ?>>
        <!--Start Container Div-->
        <div class="container_24 container">
            <!--Start Header Grid-->
            <div class="grid_24 header">
			<div class="grid_16 alpha">
                <div class="logo"> <a href="<?php bloginfo('url'); ?>"><img src="<?php if (get_option('colorway_logo') != '') { ?><?php echo get_option('colorway_logo'); ?><?php } else { ?><?php bloginfo('template_url'); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a> </div><div class="clear"></div>
				</div>
				
				<div class="grid_8 omega">
				<div class="header-info">
			  
              
			    <?php if (get_option('colorway_topright_cell') != '') { ?>
                                   <p class="cell"><img src="<?php echo get_template_directory_uri(); ?>/images/call-us.png" alt="Call us"  class="call-us" />&nbsp; <?php echo stripslashes(get_option('colorway_topright_cell')); ?></p>
                                    <?php } else { ?>
                  <p class="cell"><img src="<?php echo get_template_directory_uri(); ?>/images/call-us.png" alt="Call us"  class="call-us" />&nbsp;Call Us (111) 234 - 5678</p>
				  <?php } ?>
				  <?php if (get_option('colorway_topright_text') != '') { ?>
                                    <p><?php echo stripslashes(get_option('colorway_topright_text')); ?></p>
                                    <?php } else { ?>
                  <p>21/B, London Campus  British Road,Birmingham, UK</p>
					<?php } ?>
                    
                     <a class="btn" href="tel:<?php echo stripslashes(get_option('colorway_contact_number')); ?>"><span></span></a>
                   
                    
               </div>
				
				</div>
				
				<div class="clear"></div>
				
                <!--Start MenuBar-->
                <div class="menu-bar"> 
                    <div id="MainNav">
                        <a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>                      
                        <?php inkthemes_nav(); ?>                
                    </div>

		<div id="Bayrak">
<a href="http://demo.semtasoft.com"><img src="http://semtasoft.com/wp-content/uploads/2014/11/TR2.jpg" border="0" alt="Semtasoft"></a>  
</div>
                    <div class="clearfix"></div>
                </div>
                <!--End MenuBar-->
            </div>
            <div class="clear"></div>
            <!--End Header Grid-->