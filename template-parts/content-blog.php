<?php 
/**
*
* Template part for posts on blog page
*
*/
?>
<?php 
$args = array(
	'post-type' => 'post',
	'posts_per_page' => -1,
);
$blog_posts = new WP_Query($args);
 ?>
<?php if($blog_posts->have_posts()):
	?>
	<section id="blog">
		<?php
		while ($blog_posts->have_posts()):
			$blog_posts->the_post();
			?>
			<div class="container ">
				<article class="text-center">
					<h2><?php the_title()?></h2>
					<div class="container-fluid">
	        	<span class="horysontal-separator"></span>
	    		</div> <!-- .container-fluid -->
					<?php the_content() ?>
				</article>
			</div> <!-- .container -->
			<?
		endwhile;
		?>
	</section> <!-- #blog -->
	<?php
endif;?>


