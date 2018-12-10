<?php 
	get_header();

	$review_author_name=get_field('review_author_name');
	$additional_reviews_logos_text=get_field('additional_reviews_logos_text');
	$leave_review_link=get_field('leave_review_link', 'option');
 ?>
	
	<!--OUTPUTING REVIEWS-->
	<header class="entry-header">
    	<h1 class="entry-title">Rewiews</h1>
	</header>

	<div class="container">
		<section id="reviews">
			<div class="row">
				
				<?php 
					if(have_posts()){
						while(have_posts()){
							the_post();
							?>
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

							<?php
						}
						?>
						<?php
					}
				 ?>
			</div><!-- .row-->
		</section>
		
		<!--**Load more button-->
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	    <nav class="load_more">
	      <?php next_posts_link( 'Load More' ); ?>
	    </nav>
	  <?php endif;  ?>
		<!-- End load more button-->


<!--Under reviews section -->
		<section class="under-reviews text-center">
			<a href="<?=$leave_review_link?>" class="leave_review_link"><img src="<?= get_template_directory_uri()?>/images/leave_review.png"></a>
			<h2>Please visit the sites below for additional reviews</h2>
		</section>

 		<aside >
	      	<div class="popuper">
	        <button class="pop-close-btn" type="button"><span class="">&times</span></button>
        <aside class="review-logo-description"></aside>

      </div>
    </aside>
		<section id="review_logos">
			<p><?php echo $additional_reviews_logos_text; ?></p>
			<!--Outputing review logos -->
			<?php  
				if(have_rows('additional_reviews_logos', 'option')){
					while(have_rows('additional_reviews_logos', 'option')){
						the_row();
						$img=get_sub_field('logo');
						// $img = $img_arr['sizes']['full'];
						?>
						<div class="review_logo popup_trigger">
							<img  class="" src="<?=$img ?>" data-id="<?=get_row_index()?>">
							
						</div>

						<?php
					}
				}
			?>
			<!-- Load more section-->

			<!-- End load more section-->
		</section>

	</div><!-- .container-->



 <?php 
 	get_footer();
  ?>