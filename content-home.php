<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'birdfield' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
	<?php if( has_post_thumbnail() ): ?>
		<div class="entry-eyecatch">
			<?php the_post_thumbnail( 'large' ); ?>
		</div>
	<?php endif; ?>

	<header class="entry-header">
		<h3 class="entry-title"><?php the_title(); ?></h3>
		<time class="postdate" datetime="<?php echo get_the_time( 'Y-m-d' ) ?>"><?php echo get_post_time( get_option( 'date_format' ) ); ?></time>

		<?php $categories = get_the_category();
			$class = '';
			if ( $categories ) {
				foreach( $categories as $category ) {
					$class .= ' ' .$category->slug;
				}
			}
		?>
		<span class="category <?php echo $class; ?>">カテゴリ</span>

	</header>
	</a>
	<?php if(is_sticky()): ?>
		<i><span></span></i>
	<?php endif; ?>
</li>