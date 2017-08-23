<?php
/*
Template Name: Page with Featured Image
 */
get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

    <?php /* Featured Image */
    if (has_post_thumbnail()) { ?>
      <div
          class="entry-thumb"><?php the_post_thumbnail('full', array('alt' => the_title_attribute(array('echo' => false)), 'class' => 'img-responsive')); ?></div>
    <?php } ?>
  <div class='carousel-caption-special'><?php /* Title */
              if (get_the_title() != '') { ?>
                <h1 class="carousel-title"><?php the_title(); ?></h1>
              <?php } else { ?>
                <h1 class="carousel-title"><?php echo esc_html__('Post ID: ', 'sirius-lite');
                    the_ID(); ?></h1>
              <?php } ?>
  </div>


  <!-- Page Content -->
  <div id="page-<?php the_ID(); ?>" <?php post_class('entry details entry-page'); ?>>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="main-column one-column">
          <div class="entry-body">
         

            <div class="entry-content clearfix">
                <?php the_content();
                wp_link_pages(); ?>
            </div>
          </div>
        </div>
      </div>
	 
    </div>

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
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

            

        </div>

    <?php endwhile; ?>

<?php endif; wp_reset_query(); ?>
	</div>
  </div>




  <!-- /Page Content -->
<?php endwhile; ?>

<?php get_footer(); ?>