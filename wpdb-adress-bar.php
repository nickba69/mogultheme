<?php /* Template Name: WPDB Adress Bar */ ?>
<?php

get_header();
	if(isset($_GET) && !empty($_GET)):

		$checked_field = $_GET['field'];
		$checked_post = $_GET['pg'];
		if($checked_post && $checked_post):
			$query_results = $wpdb->get_results( 
				"
				SELECT post_title 
				FROM $wpdb->posts
				WHERE id = $checked_post  
				"
			);

			// var_dump($fivesdrafts);
			foreach ( $query_results as $query_result ) 
			{
				echo "<h2><strong>WPDB Result for checked field: </strong></h2><h1 style='text-align:center'>".$query_result->$checked_field."</h1>";
				echo $fivesdraft->post_title;
			}
		endif;

	else:?>
		<div class="container">
			
			<h1>Type a get parameters to Adress bar!</h1>
			<strong>Construction example looks like this: </strong> <span>?field=post_title&pg=179</span>
			<br>
			<br>
			<br>
			<ul>
				<ol><p>Please, insert Name of field, you want to show in<i> "field" </i>parameter</p></ol>
				<ol><p>Please, insert ID of page, you want to show in<i> "pg" </i>parameter</p></ol>
			</ul>
			 
		</div>

	
		<?php
	endif;
 ?>
