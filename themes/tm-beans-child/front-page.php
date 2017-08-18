<?php get_header(); ?>

<?php 
	$args = array( 'post_type' => 'page', 'page_id' => '24');
	$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="front-page-content">
				<?php the_post_thumbnail(); ?>
				<div id="banner-overlay">
					<h1>Marit Wilkerson</h1>
					<h2>Conservation Research, Outreach, Leadership</h2>
				</div>
				
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div>

		

	<?php endwhile; else:  ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>


	


<?php get_footer(); ?>