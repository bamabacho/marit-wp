<?php get_header(); ?>



<?php 
	$args = array( 'post_type' => 'page', 'page_id' => '24');
	$the_query = new WP_Query( $args ); 
?>

<?php if ( $the_query->have_posts() ) : ?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<div class="front-page-content">
				<?php the_post_thumbnail(); ?>
			
				
				<h1><?php the_title(); ?></h1>
				<p><?php the_content(); ?></p>
			</div>

		

	<?php endwhile; else:  ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>

<?php endif; ?>

<!--For Twitter area -->
<?php 

	
		echo beans_open_markup( 'theme_article', 'article' ); ?>
		
			<div class="twitter-block"><?php echo do_shortcode('[custom-twitter-feeds]'); ?></div>
		
	
		<?php echo beans_close_markup( 'theme_article', 'article' ); ?>


	


<?php get_footer(); ?>