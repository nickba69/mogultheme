 	<!-- Standart form to add review, contact or book appointment -->

	<?php 
		$args = array(
			'post_type' => 'custom_portfolio',
			'posts_per_page' => -1
		);
		$portfolio_posts = new WP_Query($args);

		if( $inserted_post_type == 'leave_review'){
			$submit_name = $inserted_post_type;
		}elseif($inserted_post_type == 'book_appointment'){
			$submit_name = 'appo';
		}else{
			$submit_name = 'contact'; 
		}
	 ?>
	 <section id="multipurpose-form">
		 <div class="container">
			<form method = "post" action="<?=get_permalink();?>">
		 		<div class="row">
			 		<div class="col-md-12 col-lg-6 offset-lg-2">
				        <label for="namee">Name</label><input type="text" id="namee" name="namee" required><br>
				        <label for="email">E-mail</label><input type="email" id="email" name="email"><br>
				        <label for="user_number">Phone Number</label><input type="text" id="user_number" name="number"><br>
				        <label for="cont">Inquiry</label><textarea type="textarea" id="cont" name="cont"></textarea><br>
						<?php 
						if($portfolio_posts->have_posts() && $inserted_post_type == 'leave_review'):		
						 ?>
					        <label for="post_assigned_to"> Chose Portfolio Item</label>
				        	<select name="post_assigned_to" id="post_assigned_to">
					        	<?php while($portfolio_posts->have_posts()):$portfolio_posts->the_post(); ?>

								<option value="<?php the_id()?>">
									<?php the_title() ?>
									
								</option>
					        	<?php endwhile; ?>
					        </select><br>
					    	
				        <?php endif; ?>
				        <label for=""></label><span class="bottom-line"><span>
			 		</div>	<!--offset-md-3-->
				    <div class="col-12 col-lg-2">
				        <input 
				        	type="submit" 
				        	class="submit-button" 
				        	name="<?= $submit_name?>"
				        	style="background: url('<?=get_template_directory_uri()?>/images/submit_button.png')" 
				        >
				        <!-- This is "Book appointment button" that will be visible on contact page"-->
				        <?php if($is_contact_page): ?>
				        	<div class="book-appointment-button">
						    	<img src="<?=get_template_directory_uri()?>/images/book-appointment.png" 
						    		 class="popup_trigger_book_appointment">
						    </div>
				    	<?php endif; //$is_contact_page?>
				        <!-- This is "Leave review button" that will be visible on contact page"-->
				        <?php if($is_contact_page): ?>
					        <div class="leave-review-button">
						    	<img src="<?=get_template_directory_uri()?>/images/leave_review.png" 
						    		 class="popup_trigger">
						    </div>
						<?php endif; ?> <!--$is_contact_page-->

				    </div> <!-- .col-md-2 -->
		 		</div> <!-- .row-->
		    </form>
		    <?php 
        	if($is_contact_page):
        		?>
        		<div class="popuper">
        			<?php $is_contact_page = False ?>
					<?php $inserted_post_type = 'leave_review' ?>        			
			    	<?php require get_template_directory() . '/form-standart.php'; ?>
			        <button class="pop-close-btn" type="button"><span class="">×</span></button>
			        
			    </div>
        		<div class="popuper-book-appointment">
        			<?php $is_contact_page = False ?>
        			<?php $inserted_post_type = 'book_appointment' ?>
			    	<?php  require get_template_directory() . '/form-standart.php'; ?>
			        <button class="pop-close-btn" type="button"><span class="">×</span></button>

			    </div>
					<style>
			        	#multipurpose-form .row{
			        		background: white;	
			        		padding-top: 20px;
			        	}
			        	.pop-close-btn span{
			        		color: black;
			        	}

			        </style>
        		<?php
        	endif; //$is_contact_page
         ?>
		 </div><!-- .container -->
	 </section> <!-- #multipurpose-form-->