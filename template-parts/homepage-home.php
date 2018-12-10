<?php
/**
 * Template part for showing default homepage
 *
 *  Template Name: Homepage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mogul
 */

?>
<?php
    $author_avatar = get_field('author_avatar');
    if($author_avatar){
        $author_avatar_url = $author_avatar['sizes']['large'];
    }
    $about_author = get_field('about_author');
    $author_adress = get_field('author_adress');
    $author_email = get_field('author_email');
    $author_number = get_field('author_number');
?>

<article>
    <section id="main-content">
        <div class="container width-980">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <h1><?php the_title('');?></h1>
                    <?php
                    the_content();
                }
            } ?>
        </div><!--.container .width-980-->
    </section><!-- #main-content-->
    <section class="author-info text-center">
        <!-- Outputing author info-->
        <span class="avatar"><img src="<?= $author_avatar_url;?>" alt=""></span> <!--Avatar-->
        <adress>
            <div>
                <span><?= $about_author?></span>
                <span><?=$author_adress?></span>
            </div>
            <div>
                <span><?= $author_email ?></span>
                <span><?=$author_number?></span>
            </div>
        </adress>
    </section><!--.author-info-->

</article>

<?php get_header()?>