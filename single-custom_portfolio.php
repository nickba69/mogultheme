<?php
// Find connected pages
$connected = new WP_Query( array(
  'connected_type' => 'reviews_to_portfolio',
  'connected_items' => get_queried_object(),
  'nopaging' => true,
) );

// var_dump(get_queried_object());
// Display connected pages
if ( $connected->have_posts() ) :
?>
<h3>Related pages:</h3>
<ul>
<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
	<li><?php the_permalink(); ?></li>
<?php endwhile; ?>
</ul>

<?php 	
// Prevent weirdness
wp_reset_postdata();

endif;
?>

<?php
echo (get_queried_object()->ID);
// // Create connection
// $fr = 150;
// $t = 101;
// p2p_type( 'my_connection_types' )->connect( $fr, $t, array(
// 	'date' => current_time('mysql')
// ) );
echo "Created";
?>