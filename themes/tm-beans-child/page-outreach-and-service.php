<?php
/*
Template Name: Page with Featured Image
 */
get_header(); ?>


<h1>Outreach and Service</h1>
<hr>

<?php

$args = array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
 );


$parent = new WP_Query( $args );

if ( $parent->have_posts() ) : ?>
<div class="parent-tile-container">
    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

        <div id="parent-<?php the_ID(); ?>" class="parent-page">
			<?php the_post_thumbnail(medium); ?>
            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
            <p><?php the_subtitle(); ?></p>

            

        </div>

    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>
	</div>






  <!-- /Page Content -->


<?php get_footer(); ?>