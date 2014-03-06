<?php
if ( ! function_exists( 'baca_setup' ) ) :
function baca_setup() {
	// Feeds
	add_theme_support( 'automatic-feed-links' );
	// Menus
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'baca'),
		'footer'  => __( 'Footer Navigation', 'baca')
	) );
	// Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'page-image', 1000, 250, true );
	add_image_size( 'home-image', 1000, 375, true );
	add_image_size( 'member-logo', 300, 600 );
	//add_image_size( 'home-widget', 280, 136, true );
}
endif;
add_action( 'after_setup_theme', 'baca_setup' );

function baca_scripts() {
	wp_enqueue_style( 'baca-style', get_stylesheet_uri(), array(), '20131009' );

	wp_enqueue_script( 'fonts_dot_com', 'http://fast.fonts.net/jsapi/3cf3f30d-9241-4318-b6a0-0d9eded79e0a.js' );

	wp_enqueue_script( 'forms', get_template_directory_uri() . '/js/register.js', array(), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'baca_scripts' );

// Custom Login
function baca_custom_login() {
    echo header("Location: " . get_permalink(69));
}
add_action('login_head', 'baca_custom_login');
 
function baca_login_link_url( $url ) {
   $url = get_permalink(69);
   return $url;
   }
add_filter( 'login_url', 'baca_login_link_url', 10, 2 );

function baca_redirect_login() {
	global $action;
	if (empty($action) || 'login' == $action) {
		wp_safe_redirect( get_permalink(69) );
		die;
	}
}
add_action('login_init', 'baca_redirect_login');

// BACA custom post types
function baca_custom_post_types() {
	register_post_type( 'baca_members',
		array(
			'labels' => array(
				'name' => __( 'Members' ),
				'singular_name' => __( 'Member' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'author', 'comments', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'page-attributes' ),
			'show_in_menu' => true,
			'taxonomies' => array( 'post_tag' ),
			'rewrite' => array('slug' => 'member')
		)
	);
	register_post_type( 'baca_council_members',
		array(
			'labels' => array(
				'name' => __( 'Council Members' ),
				'singular_name' => __( 'Council Member' ),
			),
			'public' => true,
			'menu_position' => 5,
			'supports' => array( 'title', 'editor', 'author', 'comments', 'excerpt', 'custom-fields', 'revisions', 'thumbnail', 'page-attributes' ),
			'show_in_menu' => true,
			'taxonomies' => array( 'post_tag' ),
			'rewrite' => array('slug' => 'council-member')
		)
	);
}
add_action( 'init', 'baca_custom_post_types' );

// Add 'http://' before web address 
function addhttp($url) {
	if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
		$url = "http://" . $url;
	}
	return $url;
}

// Add [Read more] to end of Excerpts
function new_excerpt_more( $more ) {
	return '... <a href="'. get_permalink( get_the_ID() ) . '">Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// Exclude pages from search filter
function SearchFilter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}
	return $query;
}
add_filter('pre_get_posts','SearchFilter');

// Remove extra social media fields from Users
function add_twitter_contactmethod( $contactmethods ) {
	unset($contactmethods['aim']);
	unset($contactmethods['jabber']);
	unset($contactmethods['yim']);
	//unset($contactmethods['last_name']);
	return $contactmethods;
}
add_filter('user_contactmethods','add_twitter_contactmethod', 10, 1);
// Remove color schemes from Users
function admin_del_options() {
	global $_wp_admin_css_colors;
	$_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_del_options');

// Add member to Users when 'become a member' form is filled out
function ninja_forms_register_become_a_member(){
		add_action( 'ninja_forms_post_process', 'ninja_forms_become_a_member' );
	}
	add_action( 'init', 'ninja_forms_register_become_a_member' );
function ninja_forms_become_a_member() {
	global $ninja_forms_processing;

	$form_id = $ninja_forms_processing->get_form_ID( 2 ); //Get all the user submitted values
	
	$all_fields = $ninja_forms_processing->get_all_fields( $form_id );

	if( is_array( $all_fields ) ) { //Make sure $all_fields is an array.

		$new_user = array(
	    	'user_login' => trim(strtolower(str_replace(" ", "", $all_fields[6]))),
	    	'user_pass' => wp_generate_password( 12, false ),
	        'first_name' => $all_fields[6],
	        'display_name' => $all_fields[6],
	        'nickname' => $all_fields[6],
	        'user_url' => $all_fields[33],
	        'user_email' => $all_fields[31],
	        'description' => $all_fields[60],
	        'wp_capabilities' => 'Subscriber'
	    );

	    $user_id = wp_insert_user($new_user);

	    if($user_id) :
	    	
		    update_user_meta($user_id, 'member_address_1', $ninja_forms_processing->get_field_value( 23 ));
		    update_user_meta($user_id, 'member_address_2', $ninja_forms_processing->get_field_value( 24 ));
		    update_user_meta($user_id, 'member_address_3', $ninja_forms_processing->get_field_value( 25 ));
		    update_user_meta($user_id, 'member_address_4', $ninja_forms_processing->get_field_value( 26 ));
		    update_user_meta($user_id, 'member_postcode', $ninja_forms_processing->get_field_value( 27 ));
		    update_user_meta($user_id, 'member_country', $ninja_forms_processing->get_field_value( 28 ));
		    update_user_meta($user_id, 'member_telephone', $ninja_forms_processing->get_field_value( 29 ));
		    update_user_meta($user_id, 'member_fax', $ninja_forms_processing->get_field_value( 30 ));

		    update_user_meta($user_id, 'member_business_type', $ninja_forms_processing->get_field_value( 14 ));

		    

		    //$test = $all_fields[16];
		    //$user_value = $ninja_forms_processing->get_field_value( $test );
		    //var_dump($test);
		    //update_user_meta($user_id, 'member_employees', $test);



		    update_user_meta($user_id, 'member_trading', $ninja_forms_processing->get_field_value( 51 ));
		    //update_user_meta($user_id, 'member_date_ceased', $ninja_forms_processing->get_field_value(  ));
		    //update_user_meta($user_id, 'member_comments', $ninja_forms_processing->get_field_value(  ));

		    $field_key = "field_52f4fedbcdb79";
	        $user_id = "user_" . $user_id;
	        $value = get_field($field_key, $user_id);
		    $value[] = array(
		        "more_contacts_name" => $ninja_forms_processing->get_field_value( 35 ),
		        "more_contacts_email" => $ninja_forms_processing->get_field_value( 42 ),
		        "more_contacts_mobile" => $ninja_forms_processing->get_field_value( 41 ),
		        "more_contacts_phone" => $ninja_forms_processing->get_field_value( 40 ),
		        "more_contacts_dob" => $ninja_forms_processing->get_field_value( 37 ),
		        "more_contacts_nationality" => $ninja_forms_processing->get_field_value( 39 ),
		        "more_contacts_position" => $ninja_forms_processing->get_field_value( 50 )
		    );
		    $value[] = array(
		        "more_contacts_name" => $ninja_forms_processing->get_field_value( 45 ),
		        "more_contacts_email" => $ninja_forms_processing->get_field_value( 49 ),
		        "more_contacts_mobile" => $ninja_forms_processing->get_field_value( 48 ),
		        "more_contacts_position" => $ninja_forms_processing->get_field_value( 46 ),
		        "more_contacts_phone" => $ninja_forms_processing->get_field_value( 47 )
		    );
		    update_field( $field_key, $value, $user_id );

		endif;
	}
}


function add_members() {
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM members" ); 

	foreach($results as $row) :

		$new_user = array(
	    'user_login' => trim(strtolower(str_replace(" ", "", $row->CompanyName))),
        'user_pass' => wp_generate_password( 12, false ),
        'first_name' => $row->CompanyName,
        'display_name' => $row->CompanyName,
        'nickname' => $row->CompanyName,
        'user_url' => $row->Website,
        'user_email' => $row->Email,
        'wp_capabilities' => 'Subscriber'
	    );

	    $user_id = wp_insert_user($new_user);

	    if($user_id) :

	    update_user_meta($user_id, 'member_address_1', $row->Address1);
	    update_user_meta($user_id, 'member_address_2', $row->Address2);
	    update_user_meta($user_id, 'member_address_3', $row->Address3);
	    update_user_meta($user_id, 'member_address_4', $row->Address4);
	    update_user_meta($user_id, 'member_town', $row->Town);
	    update_user_meta($user_id, 'member_county', $row->County);
	    update_user_meta($user_id, 'member_postcode', $row->PostCode);
	    update_user_meta($user_id, 'member_country', $row->Country);
	    update_user_meta($user_id, 'member_telephone', $row->Telephone);
	    update_user_meta($user_id, 'member_fax', $row->Fax);
	    update_user_meta($user_id, 'member_business_type', $row->BusinessType);
	    update_user_meta($user_id, 'member_sita', $row->Sita);
	    update_user_meta($user_id, 'member_date_elected', $row->DateElected);
	    update_user_meta($user_id, 'member_year_elected', $row->YearElected);
	    update_user_meta($user_id, 'member_date_ceased', $row->DateCeased);
	    update_user_meta($user_id, 'member_comments', $row->Comments);

	    $field_key = "field_52f4fedbcdb79";
	    $user_id = "user_" . $user_id;
	    $value = get_field($field_key, $user_id);
	    $value[] = array(
	        "more_contacts_name" => $row->ContactName, 
	        "more_contacts_email" => $row->ContactEmail,
	        "more_contacts_mobile" => $row->ContactMobile
	    );
	    $value[] = array(
	        "more_contacts_name" => $row->ContactName2, 
	        "more_contacts_email" => $row->ContactEmail2,
	        "more_contacts_mobile" => $row->ContactMobile2
	    );
	    $value[] = array(
	        "more_contacts_name" => $row->ContactName3, 
	        "more_contacts_email" => $row->ContactEmail3
	    );
	    update_field( $field_key, $value, $user_id );

	    //wp_new_user_notification( $user_id, $new_user->user_pass );

	    /*$to = array('gracetopher@hotmail.co.uk');
        $headers[] = 'From: Designinc <christopher@designinc.co.uk>';
        //$headers[] = 'Cc: jon@designinc.co.uk, frank@designinc.co.uk';
        $subject = 'Test';
        
        $message = 'Username: ' . $new_user->user_login . '<br />';
        $message .= 'Password: ' . $new_user->user_pass;

		add_filter( 'wp_mail_content_type', 'set_html_content_type' );
		wp_mail( $to, $subject, $message, $headers );
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );

		function set_html_content_type() {
		    return 'text/html';
		} */

	    endif;

	endforeach;
}
//add_action( 'load-post.php', 'add_members' );