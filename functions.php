<?php
/**
 * Mogul functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mogul
 */

if ( ! function_exists( 'mogul_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mogul_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mogul, use a find and replace
		 * to change 'mogul' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mogul', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mogul' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mogul_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mogul_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mogul_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mogul_content_width', 640 );
}
add_action( 'after_setup_theme', 'mogul_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mogul_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mogul' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mogul' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mogul_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mogul_scripts() {
	wp_enqueue_style( 'mogul-style', get_stylesheet_uri() );

	wp_enqueue_script( 'mogul-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mogul-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// DEVELOPMENT STYLES AND SCRIPTS

    wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/style/bootstrap.min.css');

    wp_enqueue_style('style-css', get_template_directory_uri().'/style/main.min.css');

    wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js');

    wp_enqueue_script('main-js', get_template_directory_uri().'/js/main.min.js');
    
	    //this part uses to get path to site in url
	    $translation_array = array( 'templateUrl' => site_url() );
		//after wp_enqueue_script
		wp_localize_script( 'main-js', 'home_url', $translation_array );

}


/*
 * AJAX SECTION
 * */
	/*Portfolio sorting*/
	add_action( 'wp_ajax_portfolio', 'portfolio_sorting_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
	add_action( 'wp_ajax_nopriv_portfolio', 'portfolio_sorting_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
	// First hook used for non authenticated users and the second is for authenticated

	function portfolio_sorting_function(){ //returning the data, that was asked by AJAX Query

	    $resulted_portfolio =  get_template_part( 'template-parts/content', 'portfolio');

	    echo $resulted_portfolio;

	    die; // Show that the task is finished
	}

	/*Services sorting*/
	add_action( 'wp_ajax_services', 'services_sorting_function' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
	add_action( 'wp_ajax_nopriv_services', 'services_sorting_function' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
	// First hook used for non authenticated users and the second is for authenticated

	function services_sorting_function(){ //returning the data, that was asked by AJAX Query

	    $resulted_services =  get_template_part( 'template-parts/content', 'services');

	    echo $resulted_portfolio;

	    die; // Show that the task is finished
	}

	/*Getting the review logo description*/
	add_action( 'wp_ajax_review_logo', 'get_logo_description_function' ); 
	add_action( 'wp_ajax_nopriv_review_logo', 'get_logo_description_function' ); 
	// First hook used for non authenticated users and the second is for authenticated

	function get_logo_description_function(){ //returning the data, that was asked by AJAX Query

		$logos = get_field('additional_reviews_logos', 'option');
	    $logo_description = $logos[$_POST['review_logo_id']]['logo_description'] ;

	    echo $logo_description;

	    die; 
	}

/*
 * Options PAGE
 * */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page();

}
/*
 *Connecting
 * */

add_action( 'wp_enqueue_scripts', 'mogul_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*
* Shortcodes
*/
add_shortcode( 'leave_review', 'input_fields' ); /*Insert this shortcode*/ 
function input_fields( $atts ) {
    if ( isset( $_POST['leave_review'] ) ) {
        $post = array(
        	'post_title' => $_POST['namee'],
            'post_content' => $_POST['cont'], 
            'post_type'    => 'reviews',
            'post_status'  => 'publish',

        );
        $the_post_id = wp_insert_post( $post);

        // rew_relatios


        add_post_meta($the_post_id, 'review_author_name', $_POST['namee'], true);
        add_post_meta($the_post_id, 'review_author_email', $_POST['email'], true);
        add_post_meta($the_post_id, 'review_author_number', $_POST['number'], true);
        // update_field('connected_to',  $the_post_id, $_POST['post_assigned_to']); //
        // add_row( 'repeater_portfolio_connections', array('attached_rewiew_id'=>$the_post_id), $_POST["post_assigned_to"] );

        $portfolio_item = $_POST["post_assigned_to"];

        $reviews = get_post_meta($portfolio_item, 'rew_relatios', true);

        if(is_array($reviews)) {
        	$reviews[] = $the_post_id;

        }else {
        	$reviews = [$the_post_id];
        }


        update_field('rew_relatios', $reviews, $portfolio_item);

    }else{
    	$inserted_post_type = 'leave_review';  
		require get_template_directory() . '/form-standart.php';
	}
}

add_shortcode('contact_us', 'contact_us_fields' );
function contact_us_fields($atts){

	$is_contact_page = True;
	require get_template_directory() . '/form-standart.php';

}

add_shortcode('book_appointment', 'book_appointment_fields' );
function book_appointment_fields($atts){
	if(isset($_POST['appo'])):
		$post = array(
        	'post_title' => $_POST['namee'],
            'post_content' => $_POST['cont'], 
            'post_type'    => 'book_appointment',
            'post_status'  => 'publish',

        );
        $the_post_id = wp_insert_post( $post);


        add_post_meta($the_post_id, 'appointment_name', $_POST['namee'], true);
        add_post_meta($the_post_id, 'appointment_email', $_POST['email'], true);
        add_post_meta($the_post_id, 'appointment_number', $_POST['number'], true);
	else:
		$inserted_post_type = 'book_appointment';
		require get_template_directory().'/form-standart.php';

	endif;
}


/*
*  LOAD MORE CODES
*/
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');

function load_posts_by_ajax_callback() {
    // check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'reviews',
        'post_status' => 'publish',
        'posts_per_page' => '4',
        'paged' => $paged,
    );

    $my_posts = new WP_Query( $args );

    if ( $my_posts->have_posts() ) :
        ?>
        <div class="row">
	        <?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>
		    	<div class="col-md-6">
					<div class="container">
						<span class="review-separator-top"></span>
					</div> <!-- .review-separator-top-->
					<article class="review">
						<p class="review-text "><?php the_content();?></p>
						<p class="review-author">- <?= $review_author_name ?></p>
					</article>
					<div class="container">
						<span class="review-separator-bottom"></span>
					</div> <!-- .review-separator-->
				</div>

	        <?php endwhile ?>
        </div> <!-- .row -->

	    <!--**Load more button-->
        
        <?php
    endif;
 
    wp_die();
}

/*
*   CREATING POST TYPE PRODUCTS
*/

function create_posttype_products() {
  register_post_type( 'products',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'show_in_menu'       => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'products'),
    )
  );
}
add_action( 'init', 'create_posttype_products' );

/***************************************************************************************************************/


/*
* Here will be the 'price', 'ammount', 'gallery'
*/

// activate meta blocks (my_extra_fields)
add_action('add_meta_boxes', 'my_extra_fields', 1);

function my_extra_fields() {
	add_meta_box( 'extra_fields', 'Дополнительные поля', 'extra_fields_box_func', 'products', 'normal', 'high'  );
}


function extra_fields_box_func( $post ){
	?>
	<p><label>Price: <input type="number" name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>"></label></p>

	<p><label>Left items: <input type="number" name="extra[mount]" value="<?php echo get_post_meta($post->ID, 'mount', 1); ?>"></label></p>

	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
	<?php
}

// Update fields on submit
add_action( 'save_post', 'my_extra_fields_update', 0 );

## Save DATA on save
function my_extra_fields_update( $post_id ){
	if (
		   empty( $_POST['extra'] )
		|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	// Save end delete data
	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // remove spaces
	foreach( $_POST['extra'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); // Delete field if info is empty
			continue;
		}

		update_post_meta( $post_id, $key, $value ); // add_post_meta()
	}

	return $post_id;
}