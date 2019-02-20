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

			<?php echo do_shortcode( '[fureainouen_vegetable_calendar id="' .get_the_ID() .'"]' );  // calendar ?>
			<div class="related-posts">
				<h2><span><?php the_title() ?></span>を使ったレシピ</h2>
			</div>
	</article>

	<?php endwhile; ?>

		<div class="more"><a href="<?php echo esc_html( get_post_type_archive_link( 'vegetable' )); ?>">「<span><?php echo esc_html(get_post_type_object( 'vegetable' )->labels->singular_name ); ?></span>」をもっと見る</a></div>
	</div>

	<?php birdfield_content_footer(); ?>
</div>

<?php get_footer(); ?>
