
<?php /* Template Name: Portfolio */ ?>

<?=get_header();?>

<?php
    $args = array( //arguments to get all portfolio categories
        'taxonomy' => 'portfolio_category',
        'hide_empty' => false,
    );
    $categories = get_terms($args);
    wp_reset_postdata();

    $portfolio_bottom_text_title = get_field('portfolio_bottom_text_title', 'option');
    $portfolio_bottom_text = get_field('portfolio_bottom_text', 'option');
    
?>

<!-- OUTPUTING THE TITLE OF THE PAGE -->
<header class="entry-header">
    <h1 class="entry-title">
        <?php the_title() ?>
    </h1>
</header>

<!--OUTPUTING THE CATEGORIES OF PORTFOLIO-->
<section class="portfolio">
    <nav class="portfolio-sorting-menu">
        <?php
            foreach( $categories as $category ) {
                ?>
                <a href="#" class="category"><?=($category->name);?></a>

                <?php
            }
        ?>
    </nav>
    <!-- SEPARATOR BEFORE PORTFOLIO ITEMS -->
    <div class="container-fluid">
        
        <span class="horysontal-separator"></span>
    </div> <!-- .container-fluid -->
    <!-- POPUP ITEMS FROM PORTFOLIO-->
    <aside >
        <div class="popuper">
            <button class="pop-close-btn" type="button"><span class="">&times</span></button>
            <img src="#" class="portfolio-full-image" alt="">
        </div>
    </aside>
    <div class="content-here container-fluid">
        <?php
            $argst = array(
                'post_type'      => 'custom_portfolio',
                'posts_per_page' => -1,
            );
        ?>

        <!--Outputing portfolio items-->
        <?php
        $all_portfolio_items = new WP_Query($argst);

        if($all_portfolio_items->have_posts()){
            ?>
            <div class="row">
            <?php
            $counter = 0;
            while($all_portfolio_items->have_posts()){
                $all_portfolio_items->the_post();
                $counter = $counter + 1;
                // $thumbnail_url = get_the_post_thumbnail_url();
                // var_dump($thumbnail_url);
                ?>
                <div class="col-md-2 col-6 <?php if($counter==1 || $counter%5==1){echo 'offset-md-1';}?>">
                    <a href="<?php the_post_thumbnail_url()?>" 
                        class="portfolio-item" 
                        style="background:url('<?php the_post_thumbnail_url()?>')">
                        
                        <!-- <img src="<?php  //the_post_thumbnail_url('large')?>" alt=""> -->
                    </a>
                </div>
                <?php
            }
            ?>
        </div> <!-- .row -->
            <?php
        };


        ?>
        <!-- SEPARATOR AFTER PORTFOLIO ITEMS -->
        <div class="container-fluid">
            <span class="horysontal-separator"></span>
        </div>

    </div><!-- .content-here -->
    <!-- PORTFOLIO TEXT IN THE BUTTOM -->
    <article class="portfolio-text text-center">
        <div class="container width-980">
            <h2><?= $portfolio_bottom_text_title?></h2>
            <p><?= $portfolio_bottom_text?></p>
        </div> <!--width-980-->
    </article>
</section> <!--.portfolio -->


<?=get_footer();?>
