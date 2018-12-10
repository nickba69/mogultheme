<?php 
/*
*
*  Template Name: Services
*
*/
?>

<?=get_header();?>
<?php
    $args = array( //arguments to get all portfolio categories
        'taxonomy' => 'services_category',
        'hide_empty' => false,
    );
    $categories = get_terms($args);
    // wp_reset_postdata();
?>

<!-- OUTPUTING THE TITLE OF THE PAGE -->
<header class="entry-header">
    <h1 class="entry-title">
        <?php the_title() ?>
    </h1>
</header>

<?php if($categories): ?>
	<section id="sorted-services">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
					<nav class="services-sorting-menu text-center">
						<?php
						    foreach( $categories as $category ) {
			                ?>
			                <a href="#" class="category"><?=($category->name);?></a>

				                <?php
				            }
				        ?>
					</nav>
				</div><!-- .col-lg-8 -->
			</div><!-- .row -->
		</div><!--  .container -->
		<div class="content-here">				
			<?=get_template_part( 'template-parts/content', 'services'); ?>
		</div>		
	</section>
	<section id="aditional-travel-services">
		<div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12">
		<?php  // Additional Services 
			wp_reset_postdata();
			if(have_rows('additional_service')):
				?>
					<div class="container block">
						<p class="block-title text-center">Additional</p>
						<div class="row">
							<?php while(have_rows('additional_service')): the_row(); ?>
								<div class="col-md-3 col-6 text-center">
										
									<p class="title"><?php the_sub_field('additional_option');?></p>
									<p class="price">$ <?php the_sub_field('additional_price');?></p>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php
			endif;
		 ?>

		 <?php // Travel Services 
			wp_reset_postdata();
			if(have_rows('travel_service')):
				?>
					<div class="container block">
						<p class="block-title text-center">Travel</p>
						<div class="row">
							<?php while(have_rows('travel_service')): the_row(); ?>
								<div class="col-md-3 col-6 text-center">	
									<p class="title"><?php the_sub_field('travel_option');?></p>
									<p class="price"><?php the_sub_field('travel_price');?>$</p>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php
			endif;
		 ?>
		</div> <!-- .col-lg-8 -->
	</section>
	<section id="service-examples">
		<div class="container">
			<p class="title">SERVICE EXAMPLES</p>
			<div class="row items">
				<div class="col-lg-3 offset-lg-3">
					<?php 
						if(have_rows('service_examples_left_column')): 
						while(have_rows('service_examples_left_column')): the_row()?>
						<p><?php the_sub_field('heading')?></p>
					<?php
						endwhile; 
						endif; ?>
				</div>  <!-- .col-md-6 -->
				<div class="col-lg-3 text-right">
					<?php 
						if(have_rows('service_examples_right_column')): 
						while(have_rows('service_examples_right_column')): the_row()?>
						<p><?php the_sub_field('heading')?></p>
					<?php
						endwhile; 
						endif; ?>
				</div> <!-- .col-md-6 -->
			</div>
		</div>
	</section>
<?php endif; ?>

<?=get_footer()?>