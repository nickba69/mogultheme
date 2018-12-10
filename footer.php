<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mogul
 */
?>
<?php
$email_updates_title = get_field('email_updates_title', 'option');
$email_updates_description = get_field('email_updates_description', 'option');

$author_info_title = get_field('author_info_title', 'option');
$author_info_name = get_field('author_info_name', 'option');
$author_info_position = get_field('author_info_position', 'option');
$author_info_adress = get_field('author_info_adress', 'option');
$author_info_email = get_field('author_info_email', 'option');
$author_info_number = get_field('author_info_number', 'option');

$sosials_title = get_field('sosials_title', 'option');
$socials_description = get_field('socials_description', 'option');
$social_icons = get_field('social_icons', 'option');



?>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container">
            <section class="footer-columns">
                <div class="row">
                    <div class="col-md-3 footer-email-updates">
                        <h4 class="footer-column-title"><?=$email_updates_title?></h4>
                        <p class="footer-column-subtitle"><?=$email_updates_description?><br> blah blah blah</p>
                        <form action="<?php the_permalink(); ?>" method="post">
                            <input type="email" />
                        </form>

                    </div> <!-- .email-updates -->
                    <div class="col-md-6  author-info">
                        <h4 class="footer-column-title"><?=$author_info_title?></h4>
                        <p class="footer-column-subtitle"><?=$author_info_name?><br> <?=$author_info_position?></p>
                        <adress>
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-sm-12">
                                    <img src="<?=get_template_directory_uri()?>/images/map_icon.png" alt=""> <?=$author_info_adress?>
                                </div>
                                <div class="col-xl-4 col-lg-12 col-sm-12">
                                    <img src="<?=get_template_directory_uri()?>/images/email_icon.png" alt=""> <?=$author_info_email?>
                                </div>
                                <div class="col-xl-4 col-lg-12 col-sm-12">
                                    <img src="<?=get_template_directory_uri()?>/images/phone_icon.png" alt=""> <?=$author_info_number?>
                                </div>
                            </div>
                        </adress>
                    </div><!-- .author-credit -->
                    <div class="col-md-3 socials">
                        <h4 class="footer-column-title"><?=$email_updates_title?></h4>
                        <p class="footer-column-subtitle"><?=$email_updates_description?><br> blah blah blah</p>
                        <!-- Outputing social links--!>
                        <?php
                            if(have_rows('social_icons', 'option')){
                                while(have_rows('social_icons', 'option')): the_row();
                                    ?>
                                    <?php

                                        $social_url = get_sub_field('icon')['sizes']['large'];

                                    ?>

                                    <a href="<?php the_sub_field('link')?>" class="footer-social-icon"><img src="<?= $social_url?>"></a>
                                    <?php
                                endwhile;

                            }
                        ?>
                    </div><!-- .socials -->
                </div><!-- .row -->
            </section>

		</div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
