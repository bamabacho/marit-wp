<?php
/*
Template Name: Page with Featured Image
 */
get_header(); ?>


<h1>Focal Areas</h1>
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

  <div id='recent-post-page'>
    <?php
$args = array(
  'numberposts' => 3,
  'offset' => 0,
  'orderby' => 'post_date',
  'order' => 'DESC',
  'include' => '',
  'exclude' => '',
  'meta_key' => '',
  'meta_value' =>'',
  'post_type' => 'post',
  'post_status' => 'publish',
  'suppress_filters' => true
);

$recent_posts = wp_get_recent_posts( $args, ARRAY_A );
?>

<h2>Recent Posts</h2>
<ul>
<?php

  foreach( $recent_posts as $recent ){
    echo '<li><a href="' . get_permalink($recent["ID"]) . '">' .   $recent["post_title"].'</a> </li> ';
  }
  wp_reset_query();
?>
</ul>
  </div>
  




  <!-- /Page Content -->


<?php get_footer(); ?>