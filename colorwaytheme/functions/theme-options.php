<?php
add_action('init', 'of_options');
if (!function_exists('of_options')) {
    function of_options() {
        // VARIABLES
        $themename = function_exists( 'wp_get_theme' ) ? wp_get_theme() : get_current_theme();
        $themename = $themename['Name'];
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = get_option('of_options');
        $file_rename = array("on" => "On", "off" => "Off");
        //Stylesheet Reader
        $alt_stylesheets = array("black" =>
            "black", "brown" => "brown", "blue" => "blue", "green" => "green", "pink" => "pink", "purple" => "purple", "red" => "red", "yellow" => "yellow");
		//Stylesheet Reader
       $lan_stylesheets = array("Default" => "Default", "rtl" => "RTL");
        // Test data
        $test_array = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");
        // Multicheck Array
        $multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
        // Multicheck Defaults
        $multicheck_defaults = array("one" => "1", "five" => "1");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        // Pull all the categories into an array
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_bloginfo('stylesheet_directory') . '/images/';
        $options = array();
        $options[] = array("name" => "General Settings",
            "type" => "heading");
			
        $options[] = array("name" => "Custom Logo",
            "desc" => "Upload a logo for your Website. The suitable size for the logo is 215px width x 55px height but it can be varied.",
            "id" => "colorway_logo",
            "type" => "upload");
			
        $options[] = array("name" => "Custom Favicon",
            "desc" => "Here you can upload a Favicon for your Website. Specified size is 16px x 16px.",
            "id" => "colorway_favicon",
            "type" => "upload");
			
	 $options[] = array("name" => "Top Right Contact Details",
            "desc" => "Mention the contact details here which will be displayed on the top right corner of home page.",
            "id" => "colorway_topright_cell",
            "std" => "",
            "type" => "textarea");
		$options[] = array("name" => "Contact Number For Tap To Call Feature",
            "desc" => "Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.",
            "id" => "colorway_contact_number",
            "std" => "",
            "type" => "text");
		 $options[] = array("name" => "Home Page Top Right Address.",
            "desc" => "Mention the address here which will be displayed on the top right corner of the home page just below the contact number.",
            "id" => "colorway_topright_text",
            "std" => "",
            "type" => "textarea");
			
			
			
        $options[] = array("name" => "Google Tracking Code",
            "desc" => "Go to http://www.google.co.in/analytics/ and create an account by mentioning the details of your website and get a tracking code which you can paste here to track your website statistics regularly.",
            "id" => "colorway_analytics",
            "std" => "",
            "type" => "textarea");
			
        $options[] = array("name" => "Background Image",
            "desc" => "Choose a suitable background image that will complement your website.",
            "id" => "inkthemes_bodybg",
            "std" => "",
            "type" => "upload");
			
        $options[] = array("name" => "Front Page On/Off",
            "desc" => "If the front page option is active then home page will appear otherwise blog page will display.",
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);

//****=============================================================================****//
//****-----------This code is used for creating slider settings--------------------****//							
//****=============================================================================****//						
        $options[] = array("name" => "Slider Settings",
            "type" => "heading");
			
        $options[] = array("name" => "First Slider Image",
            "desc" => "Upload the First image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage1",
            "std" => "",
            "type" => "upload");
			
        $options[] = array("name" => "1111. First Slider Heading",
            "desc" => "Mention the heading for the First slider.",
            "id" => "colorway_slideheading1",
            "std" => "",
            "type" => "textarea");
			
        $options[] = array("name" => "Link for First slider",
            "desc" => "Mention the URL for First image.",
            "id" => "colorway_slidelink1",
            "std" => "",
            "type" => "text");
			
        $options[] = array("name" => "First Slider Description",
            "desc" => "Here mention a short description for the First slider heading.",
            "id" => "colorway_slidedescription1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "2222. Second Slider Image",
            "desc" => "Upload the Second image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage2",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Second Slider Heading",
            "desc" => "Mention the heading for the Second slider.",
            "id" => "colorway_slideheading2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Link for Second slider",
            "desc" => "Mention the URL for Second image.",
            "id" => "colorway_slidelink2",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Second Slider Description",
            "desc" => "Here mention a short description for the Second slider heading.",
            "id" => "colorway_slidedescription2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "3333. Third Slider Image",
            "desc" => "Upload the Third image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage3",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Third Slider Heading",
            "desc" => "Mention the heading for the Third slider.",
            "id" => "colorway_slideheading3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Link for Third slider",
            "desc" => "Mention the URL for Third image.",
            "id" => "colorway_slidelink3",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Third Slider Description",
            "desc" => "Here mention a short description for the Third slider heading.",
            "id" => "colorway_slidedescription3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "4444. Fourth Slider Image",
            "desc" => "Upload the Fourth image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage4",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Fourth Slider Heading",
            "desc" => "Mention the heading for the Fourth slider.",
            "id" => "colorway_slideheading4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Link for Fourth slider",
            "desc" => "Mention the URL for Fourth image.",
            "id" => "colorway_slidelink4",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Fourth Slider Description",
            "desc" => "Here mention a short description for the Fourth slider heading.",
            "id" => "colorway_slidedescription4",
            "std" => "",
            "type" => "textarea");
			$options[] = array("name" => "5555. Fifth Slider Image",
            "desc" => "Upload the Fifth image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage5",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Fifth Slider Heading",
            "desc" => "Mention the heading for the Fifth slider.",
            "id" => "colorway_slideheading5",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Link for Fifth slider",
            "desc" => "Mention the URL for Fifth image.",
            "id" => "colorway_slidelink5",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Fifth Slider Description",
            "desc" => "Here mention a short description for the Fifth slider heading.",
            "id" => "colorway_slidedescription5",
            "std" => "",
            "type" => "textarea");
			$options[] = array("name" => "6666. Sixth Slider Image",
            "desc" => "Upload the Sixth image for the slider. Recommended size is 897px width x 355px height.",
            "id" => "colorway_slideimage6",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Sixth Slider Heading",
            "desc" => "Mention the heading for the Sixth slider.",
            "id" => "colorway_slideheading6",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Link for Sixth slider",
            "desc" => "Mention the URL for Sixth image.",
            "id" => "colorway_slidelink6",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Sixth Slider Description",
            "desc" => "Here mention a short description for the Sixth slider heading.",
            "id" => "colorway_slidedescription6",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//							
//****=============================================================================****//	
        $options[] = array("name" => "Home Page Settings",
            "type" => "heading");
        $options[] = array("name" => "Feature Text Heading",
            "desc" => "Mention the text (punch line) for feature heading here which will display just below the slider.",
            "id" => "inkthemes_mainheading",
            "std" => "",
            "type" => "textarea");
        //***Code for first column***//
        $options[] = array("name" => "First Feature Column Image",
            "desc" => "Upload the image for the First column. Specified size is 196px width x 114px height.",
            "id" => "inkthemes_fimg1",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "First Feature Column Heading",
            "desc" => "Here mention the heading for the First column.",
            "id" => "inkthemes_headline1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "First Feature Link URL",
            "desc" => "Mention the URL here to link the image to any pages.",
            "id" => "inkthemes_link1",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "First Feature Column Description",
            "desc" => "Mention the short description for the First column heading.",
            "id" => "inkthemes_feature1",
            "std" => "",
            "type" => "textarea");
        //***Code for second column***//	
        $options[] = array("name" => "Second Feature Image",
            "desc" => "Upload the image for the second column. Specified size is 196px width x 114px height.",
            "id" => "inkthemes_fimg2",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Second Feature Column Heading",
            "desc" => "Here mention the heading for the second column.",
            "id" => "inkthemes_headline2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Second Feature Link URL",
            "desc" => "Mention the URL here to link the image to any pages.",
            "id" => "inkthemes_link2",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Second Feature Column Description",
            "desc" => "Mention the short description for the second column heading.",
            "id" => "inkthemes_feature2",
            "std" => "",
            "type" => "textarea");
        //***Code for third column***//	
        $options[] = array("name" => "Third Feature Image",
            "desc" => "Upload the image for the third column. Specified size is 196px width x 114px height.",
            "id" => "inkthemes_fimg3",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Third Feature Column Heading",
            "desc" => "Here mention the heading for the third column.",
            "id" => "inkthemes_headline3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Third Feature Link URL",
            "desc" => "Mention the URL here to link the image to any pages.",
            "id" => "inkthemes_link3",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Third Feature Column Description",
            "desc" => "Mention the short description for the third column heading.",
            "id" => "inkthemes_feature3",
            "std" => "",
            "type" => "textarea");
        //***Code for fourth column***//	
        $options[] = array("name" => "Fourth Feature Image",
            "desc" => "Upload the image for the Fourth column. Specified size is 196px width x 114px height.",
            "id" => "inkthemes_fimg4",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => "Fourth Feature Column Heading",
            "desc" => "Here mention the heading for the Fourth column.",
            "id" => "inkthemes_headline4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Fourth Feature Link URL",
            "desc" => "Mention the URL here to link the image to any pages.",
            "id" => "inkthemes_link4",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Fourth Feature Column Description",
            "desc" => "Mention the short description for the Fourth column heading.",
            "id" => "inkthemes_feature4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Home Page Testimonial Description",
            "desc" => "Here mention the short description of your business so that the visitors can understand your business.",
            "id" => "inkthemes_testimonial",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => "Styling Options",
            "type" => "heading");
        $options[] = array("name" => "Theme Stylesheet",
            "desc" => "Select any desired color for the theme from different available colors.",
            "id" => "colorway_altstylesheet",
            "std" => "green",
            "type" => "select",
            "options" => $alt_stylesheets);
		$options[] = array("name" => "Theme Language",
            "desc" => "By default the theme content displays from left to right which you can change to right to left i.e. switching it to RTL.",
            "id" => "colorway_lanstylesheet",
            "std" => "Default",
            "type" => "select",
            "options" => $lan_stylesheets);
        $options[] = array("name" => "Custom CSS",
            "desc" => "Quickly add some custom CSS code to your theme by writing the code in this block.",
            "id" => "colorway_customcss",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Footer Settings",
            "type" => "heading");
        $options[] = array("name" => "Facebook URL",
            "desc" => "Mention the URL of your Facebook Link here. If you have one.",
            "id" => "colorway_facebook",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Twitter URL",
            "desc" => "Mention the URL of your Twitter Link here. If you have one.",
            "id" => "colorway_twitter",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "RSS Feed URL",
            "desc" => "Mention the URL of your RSS Feed Link here. If you have one.",
            "id" => "colorway_rss",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Linked In URL",
            "desc" => "Mention the URL of your Linked In Link here. If you have one.",
            "id" => "colorway_linkedin",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Stumble Upon URL",
            "desc" => "Mention the URL of your Stumble Upon Link here. If you have one.",
            "id" => "colorway_stumble",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Digg URL",
            "desc" => "Mention the URL of your Digg Link here. If you have one.",
            "id" => "colorway_digg",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => "Footer Text",
            "desc" => "Write the text here that will be displayed on the footer i.e. at the bottom of the Website.",
            "id" => "footer_text",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating color SEO description--------------****//							
//****=============================================================================****//						
        $options[] = array("name" => "SEO Options",
            "type" => "heading");
        $options[] = array("name" => "Meta Keywords (comma separated)",
            "desc" => "Meta keywords provide search engines with additional information about topics that appear on your site. This only applies to your home page. Keyword Limit Maximum 8",
            "id" => "colorway_keyword",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Description",
            "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.Optimal Length for Search Engines, Roughly 155 Characters",
            "id" => "colorway_description",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => "Meta Author Name",
            "desc" => "You should write the full name of the author here. This only applies to your home page.",
            "id" => "colorway_author",
            "std" => "",
            "type" => "text");
        update_option('of_template', $options);
        update_option('of_themename', $themename);
        update_option('of_shortname', $shortname);
    }

}
?>