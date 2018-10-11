<?php get_header(); ?>

<div id="content">
	<?php birdfield_content_header(); ?>

	<div class="container">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php echo fureainouen_get_catchcopy(); ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php $selected = get_field( 'calendar' );  // 収穫カレンダー ?>
				<?php if(is_array($selected)): ?>

				<table class="vegetable-calendar"><tbody><tr><th class="title"><em>&nbsp;</em></th><th class="data"><span>1月</span><span>2月</span><span>3月</span><span>4月</span><span>5月</span><span>6月</span><span>7月</span><span>8月</span><span>9月</span><span>10月</span><span>11月</span><span>12月</span></th></tr>

				<tr>
					<td class="title">収穫時期</td>
					<td class="data">
					<?php for( $i = 1; $i <= 12; $i++ ){
						if( in_array( $i, $selected) ) { ?>
							<span class="best"><?php echo $i; ?></span>
					<?php	}
						else{ ?>
							<span><?php echo $i; ?> </span>
						<?php	}
					} ?>

				</td></tr></tbody></table>
			<?php endif; ?>

		</article>

	<?php endwhile; ?>

		<div class="more"><a href="<?php echo esc_html( get_post_type_archive_link( 'vegetable' )); ?>"><?php echo esc_html(get_post_type_object( 'vegetable' )->labels->singular_name ); ?>をもっと見る</a></div>
	</div>

	<?php birdfield_content_footer(); ?>
</div>

<?php get_footer(); ?>
