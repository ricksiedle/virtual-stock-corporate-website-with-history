<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

 $v_img_position = '';

if( get_the_post_thumbnail( $post->ID ) ) {

	$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
	$imgmeta = wp_get_attachment_metadata( $post_thumbnail_id );
	
	/**
	 * Check if the feature image of the post is portrait or landscape  or some
	 * kind of it :) and than set $v_img_position class
	 * 
	 */
	if(wp_is_mobile()) {
		$v_img_position = 'grid-item--width2';
	} else {
		if ($imgmeta['width'] > 1.5 * $imgmeta['height']) {
			$v_img_position = 'grid-item--width2';
		} elseif ( 1.3 * $imgmeta['width'] < $imgmeta['height'] ) {
			$v_img_position = 'grid-item--height2';
		} else {
			$v_img_position = '';
		}
	}
}


?>


<article <?php post_class(['grid-item', $v_img_position]); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php 
			if( get_the_post_thumbnail( $post->ID, 'full' ) ) {
		?>		
		
			<a class="v-img-expose" style="background-image: url('<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>') "></a>

		<?php

			}
			else {
		?>
				<a class="v-img-expose" style="background-image: url('<?php get_bloginfo( "stylesheet_directory" ) . '/images/thumbnail-default.jpg'; ?>') "></a>
		<?php
			}
		?>
		<div class="header-title-wrapper">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h2>' ); ?>
		</div>

		<a class="read_more_hyperlink" href="<?php the_permalink(); ?>"><button> <?php _e('Read More', 'virtual'); ?> </button></a>

		<div class="category_name_wrapper">
			<a href="<?php echo get_category_link( get_the_category( $id )[0]->cat_ID ); ?>"><?php echo get_the_category( $id )[0]->name; ?></a>
		</div>
	</header><!-- .entry-header -->


</article><!-- #post-## -->

