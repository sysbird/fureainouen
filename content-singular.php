<header class="entry-header">
	<h1 class="entry-title"><?php the_title(); ?></h1>

	<?php if( is_single() ) : ?>
		<time class="postdate" datetime="<?php echo get_the_time( 'Y-m-d' ) ?>"><?php echo get_post_time( get_option( 'date_format' ) ); ?></time>
		<?php $categories = get_the_category();
			$class = '';
			if ( $categories ) {
				foreach( $categories as $category ) {
					$class .= ' ' .$category->slug;
				}
			}
		?>
		<span class="category <?php echo $class; ?>"><?php the_category( ' ' ) ?></span>
	<?php endif; ?>

</header>
<div class="entry-content">
	<?php the_content(); ?>
	<?php wp_link_pages( array(
		'before'		=> '<div class="page-links">' . __( 'Pages:', 'birdfield' ),
		'after'			=> '</div>',
		'link_before'	=> '<span>',
		'link_after'	=> '</span>'
		) ); ?>
</div>

