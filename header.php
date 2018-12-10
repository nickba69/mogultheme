<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */

?>

<?php
/** Statenment that decides what banner to show on page**/
if(is_front_page()): // Chech if you on homepage
    $banner =  'home-banner text-center';  // Shows big banner
else:
    $banner = 'banner text-right'; // Shows little banner
endif;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mogul' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="container">
            <div class="row">
                <div class="book-appointment col-md-1 col-sm-1">
                    <a href="<?=get_the_permalink()?>/book-your-appointment/"><img src="<?= get_template_directory_uri()?>/images/book-appointment.png" alt="here some about">
                </div><!--.book-appointment-->
                <div class="col-md-11 col-sm-11">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'mogul' ); ?></button>
                        <?php
                        wp_nav_menu( array(
                            'menu_id'        => 'primary-menu',
                        ) );
                        ?>
                    </nav><!-- #site-navigation -->
                </div> <!--.col-md-10-->
            </div><!--.row-->
        </div><!--.container-->

        <div class="<?=$banner?> container-fluid">
            <?php the_custom_logo()?>
        </div><!--.banner-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
