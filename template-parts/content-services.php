<?php
/**
 * Template part for displaying services from categories
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mogul
 */

?>
<?php 
// Variables
$service_name = get_field('service_name');
$service_price = get_field('service_price');
$service_description = get_field('service_description');

 ?>
<?php
    if ($_POST['category']): // if the form was sent (to get videos from one category)
        $args = array(
            'post_type'      => 'services',
            'posts_per_page' => -1,
            'tax_query'      => array(
	                array(
	                    'taxonomy' => 'services_category',
	                    'field'    => 'slug',
	                    'terms'    => $_POST['category'],
	                ),
	            ),
        );
    else:
    	$args = array(
    		'post_type'      => 'services',
    		'posts_per_page' => -1,
    	);
    endif;

	$outputed_services = new WP_Query($args);
?>


<!--Outputing services-->
<?php
        // $all_portfolio_items = new WP_Query($argms);
	if($outputed_services->have_posts()):
	?>
		<div class="container">
			<div class="row sorted-services">
			<?php
				while($outputed_services->have_posts()):
					$outputed_services->the_post();
					?>
					<div class="col-md-4 col-sm-6 text-center service-item">
						<p class="service-title"><?=get_field('service_name');?></p>
						<p class="price">$ <?=get_field('service_price');?></p>
						<!-- <p class="service_description"></p> -->
						<div class="service_description"><?=get_field('service_description');?></div>
					</div>
					<?php
				endwhile;
			?>
			</div> <!-- .row -->
		</div>  <!-- .container -->

		
	<?php
	endif;
?>
