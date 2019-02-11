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

			<?php //related recipe
				$recipe_count = 0;
				$vegetable_title = get_the_title();
				$args = array(
						'tag'				=> $vegetable_title,
						'posts_per_page'	=> 6,
						'orderby' 			=> 'rand',
						'post_type'			=> 'post',
						'post_status'		=> 'publish',
					);
			
				$the_query = new WP_Query($args);
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						if( !$recipe_count ){
							echo '<h2>' .$vegetable_title .'を使ったレシピ</h2>';
							echo '<div class="tile">';
						}

						get_template_part( 'content', 'vegetable' );
						$recipe_count++;
					endwhile;
			
					wp_reset_postdata();
				endif;

				if($recipe_count ){
					echo '</div>';
				}
			?>
	</article>

	<?php endwhile; ?>

		<div class="more"><a href="<?php echo esc_html( get_post_type_archive_link( 'vegetable' )); ?>">「<span><?php echo esc_html(get_post_type_object( 'vegetable' )->labels->singular_name ); ?></span>」をもっと見る</a></div>
	</div>

	<?php birdfield_content_footer(); ?>
</div>

<?php get_footer(); ?>
