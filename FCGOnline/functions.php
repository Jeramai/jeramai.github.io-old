<?php
add_theme_support( 'post-thumbnails' );
add_filter('widget_text', 'do_shortcode');
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');
set_post_thumbnail_size( 350, 350 );

//Hiermee word je naar een andere pagina gestuurd
function redirect($url) 
{
	if (!headers_sent())
	{    
		header('Location: '.$url);
		exit;
	}
	else
	{  
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0; url='.$url.'" />';
		echo '</noscript>'; exit;
	}
	unset($url);
}

function  strip_shortcode_gallery( $content ) {
    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'gallery' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
    return $content;
}

function wptutsplus_widgets_init() 
{ 
	// Textwidgets voor de homepagina
    register_sidebar( array(
        'name' => 'Intro Tekst boven',
        'id' => 'sidebar-widget-area',
        'description' => 'Tekstarea voor bovenaan de homepagina.',
        'before_widget' => '<section style="text-align: center; font-size: 22px;" id="cd-placeholder-1" class="cd-section cd-container">',
        'after_widget' => '</section>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
      register_sidebar( array(
        'name' => 'Footer',
        'id' => 'contact-widget-area',
        'description' => 'Contactgegevens indiv, onderaan elke pagina',
        'before_widget' => '<div class="col-md-4">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) ); 
}
add_action( 'widgets_init', 'wptutsplus_widgets_init' );
function register_my_menu() 
{
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );
function register_cpt_custom_project() 
{
	$labels = array(
		'name' => _x( 'Text Slider', 'custom_project' ),
		'singular_name' => _x( 'projecten', 'custom_project' ),
		'add_new' => _x( 'Nee', 'custom_project' ),
		'add_new_item' => _x( 'Nieuwe tekst', 'custom_project' ),
		'edit_item' => _x( 'Pas een tekst aan', 'custom_project' ),
		'new_item' => _x( 'Nieuwe tekst', 'custom_project' ),
		'search_items' => _x( 'Zoek een tekst', 'custom_project' ),
		'not_found' => _x( 'Geen teksten gevonden', 'custom_project' ),
		'not_found_in_trash' => _x( 'Geen teksten gevonden in de prullebak', 'custom_project' ),
		'parent_item_colon' => _x( ' ', 'custom_project' ),
		'menu_name' => _x( 'InDiv Text Slider', 'custom_project' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'Slideshow tekst indiv',
		'supports' => array('title', 'editor', 'revisions', 'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-image-flip-horizontal',
		'show_in_nav_menus' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => true,
		'has_archive' => false,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'custom_project', $args );
}
add_action( 'init', 'register_cpt_custom_project' );
function register_cpt_Diensten() 
{
	$labels = array(
		'name' => _x( 'Diensten op de Homepage', 'Diensten' ),
		'singular_name' => _x( 'Dienst', 'Diensten' ),
		'add_new' => _x( 'Voeg Dienst toe', 'Diensten' ),
		'add_new_item' => _x( 'Nieuwe Dienst', 'Diensten' ),
		'edit_item' => _x( 'Pas deze Dienst aan', 'Diensten' ),
		'new_item' => _x( 'Nieuwe Dienst', 'Diensten' ),
		'search_items' => _x( 'Zoek Diensten', 'Diensten' ),
		'not_found' => _x( 'Geen Diensten gevonden', 'Diensten' ),
		'not_found_in_trash' => _x( 'Geen Diensten gevonden in de prullebak', 'Diensten' ),
		'parent_item_colon' => _x( ' ', 'Diensten' ),
		'menu_name' => _x( 'Diensten Home', 'Diensten' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'Diensten van InDiv',
		'supports' => array('title', 'editor', 'revisions', 'gallery' ,'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-products',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'Diensten', $args );
}
add_action( 'init', 'register_cpt_Diensten' );

function register_cpt_OverOns() 
{
	$labels = array(
		'name' => _x( 'Over Ons', 'OverOns' ),
		'singular_name' => _x( 'Over Ons', 'OverOns' ),
		'add_new' => _x( 'Voeg toe', 'OverOns' ),
		'add_new_item' => _x( 'Nieuwe OverOns', 'OverOns' ),
		'edit_item' => _x( 'Pas aan', 'OverOns' ),
		'new_item' => _x( 'Nieuw', 'OverOns' ),
		'search_items' => _x( 'Zoek projecten', 'OverOns' ),
		'not_found' => _x( 'Geen project gevonden', 'OverOns' ),
		'not_found_in_trash' => _x( 'Geen projecten gevonden in de prullebak', 'OverOns' ),
		'parent_item_colon' => _x( ' ', 'OverOns' ),
		'menu_name' => _x( 'Over Ons', 'OverOns' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'OverOns Pagina',
		'supports' => array('title', 'editor', 'revisions', 'gallery' ,'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-groups',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'OverOns', $args );
}
add_action( 'init', 'register_cpt_OverOns' );

function register_cpt_Contact() 
{
	$labels = array(
		'name' => _x( 'Contact Pagina', 'Contact' ),
		'singular_name' => _x( 'Contact', 'Contact' ),
		'add_new' => _x( 'Voeg toe', 'Contact' ),
		'add_new_item' => _x( 'Nieuwe Contact', 'Contact' ),
		'edit_item' => _x( 'Pas aan', 'Contact' ),
		'new_item' => _x( 'Nieuw', 'Contact' ),
		'search_items' => _x( 'Zoek projecten', 'Contact' ),
		'not_found' => _x( 'Geen project gevonden', 'Contact' ),
		'not_found_in_trash' => _x( 'Geen projecten gevonden in de prullebak', 'Contact' ),
		'parent_item_colon' => _x( ' ', 'Contact' ),
		'menu_name' => _x( 'Contact Pagina', 'Contact' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'Contact Pagina',
		'supports' => array('title', 'editor', 'revisions', 'gallery' ,'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-phone',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'Contact', $args );
}
add_action( 'init', 'register_cpt_Contact' );

function register_cpt_Privacy() 
{
	$labels = array(
		'name' => _x( 'Privacybeleid', 'Privacy' ),
		'singular_name' => _x( 'Privacybeleid', 'Privacy' ),
		'add_new' => _x( 'Voeg toe', 'Privacy' ),
		'add_new_item' => _x( 'Nieuwe Privacy', 'Privacy' ),
		'edit_item' => _x( 'Pas aan', 'Privacy' ),
		'new_item' => _x( 'Nieuw', 'Privacy' ),
		'search_items' => _x( 'Zoek Privacybeleid', 'Privacy' ),
		'not_found' => _x( 'Geen Privacybeleid gevonden', 'Privacy' ),
		'not_found_in_trash' => _x( 'Geen Privacybeleid gevonden in de prullebak', 'Privacy' ),
		'parent_item_colon' => _x( ' ', 'Privacy' ),
		'menu_name' => _x( 'Privacybeleid', 'Privacy' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'Privacybeleid',
		'supports' => array('title', 'editor', 'revisions', 'gallery' ,'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-lock',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'Privacy', $args );
}
add_action( 'init', 'register_cpt_Privacy' );

function register_cpt_Diensten_pagina() 
{
	$labels = array(
		'name' => _x( 'Diensten op de Diensten Pagina', 'Diensten_pagina' ),
		'singular_name' => _x( 'Diensten_pagina', 'Diensten_pagina' ),
		'add_new' => _x( 'Voeg Dienst toe', 'Diensten_pagina' ),
		'add_new_item' => _x( 'Nieuwe Dienst', 'Diensten_pagina' ),
		'edit_item' => _x( 'Pas deze Dienst aan', 'Diensten_pagina' ),
		'new_item' => _x( 'Nieuwe Dienst', 'Diensten_pagina' ),
		'search_items' => _x( 'Zoek Diensten', 'Diensten_pagina' ),
		'not_found' => _x( 'Geen Diensten gevonden', 'Diensten_pagina' ),
		'not_found_in_trash' => _x( 'Geen Diensten gevonden in de prullebak', 'Diensten_pagina' ),
		'parent_item_colon' => _x( ' ', 'Diensten_pagina' ),
		'menu_name' => _x( 'Diensten Pagina', 'Diensten_pagina' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'description' => 'Dienstenpagina van InDiv',
		'supports' => array('title', 'editor', 'revisions', 'gallery' ,'thumbnail'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 7,
		'menu_icon' => 'dashicons-products',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => true,
		'map_meta_cap' => true,
		'capability_type' => 'post',
		'capabilities' => array(
		'create_posts' => false // Removes support for the "Add New" function
		)
	);
      # Nu worden de custom fields aangepakt en benoemd
	register_post_type( 'Diensten_pagina', $args );
}
add_action( 'init', 'register_cpt_Diensten_pagina' );
function project_images_example() 
{
	$mypost = array( 'post_type' => 'custom_project', 'posts_per_page' => 3 );
	# Nu in een var zetten welke hij moet hebben voor de loop
	$loop = new WP_Query( $mypost );
	# Nu de loop
	
		while ( $loop->have_posts() ) : $loop->the_post();
				 the_title(); 
				 the_content(); 				 
		endwhile;
	?>
	
		<?php
}
function Diensten()
{
	$mypost = array( 'post_type' => 'Diensten', 'posts_per_page' => 15 );
	# Nu in een var zetten welke hij moet hebben voor de loop
	$loop = new WP_Query( $mypost );
	# Nu de loop
	while ( $loop->have_posts() ) : $loop->the_post();
	
		$foto = get_the_post_thumbnail($post->ID,'thumbnail');
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
		$url = $thumb[0];
		//hier word de link van de thumbnail opgehaald
		?>
			<div id='publicatie_tekst' style=' overflow-y: hidden;'><div id='titel' style="font-size: 14px; min-height: 32px; font-weight: bold;"><?php the_title(); ?> </div> <div id='publicatie_tekst_bericht' style='top: -10px;'><?php the_content(); ?> </div>
		<?php
	endwhile;
}

function Werkwijze_foto() 
{
	$mypost = array( 'post_type' => 'werkwijze', 'posts_per_page' => 2);
	# Nu in een var zetten welke hij moet hebben voor de loop
	$loop = new WP_Query( $mypost );
	# Nu de loop
	while ( $loop->have_posts() ) : $loop->the_post();
		$foto = '';
		$foto = get_the_post_thumbnail($post->ID,'thumbnail');
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );
		$url = $thumb['0'];
		//hier word de link van de thumbnail opgehaald
		?>
		<div class='Werkwijze_image' style="background-image:url('<?php echo $url ?>');"></div>
		<?php
	endwhile;
}

function project_example() 
{
	project_images_example();
	ob_start();
	return ob_get_clean();	
}
add_shortcode( 'project_voorbeeld', 'project_example' );
function all_projects() 
{
	show_everything();
	ob_start();
	return ob_get_clean();	
}
add_shortcode( 'alle_projecten', 'all_projects' );
function Contact1() 
{
	Contactpagina();
	ob_start();
	return ob_get_clean();	
}
add_shortcode( 'contact1', 'contact1' );
function publiek() 
{
	Diensten();
	ob_start();
	return ob_get_clean();	
}
add_shortcode( 'all_publications', 'publiek' );
function werkwijzen() 
{
	Werkwijze_foto();
	ob_start();
	return ob_get_clean();	
}
add_shortcode( 'volle_werkwijze', 'werkwijzen' );
?>