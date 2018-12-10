<?php /* Template Name: Adress Bar */ ?>
<?php

get_header();
	if(isset($_GET) && !empty($_GET)):

		$checked_field = $_GET['field'];  // writting into avriable the name of field that we need
		$checked_post = get_post($_GET['pg']); // The post with ID that was sent in adress bar
		if($checked_post && $checked_post):
			echo "<h2><strong>WPDB Result for checked field: </strong></h2>";
			echo "<h1 style='text-align:center'>".$checked_post->$checked_field."</h1>"; //outputing the value of 
																						//field from post
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
