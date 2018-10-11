<?php get_header(); ?>

<div id="content">
	<?php birdfield_content_header(); ?>

	<?php if( ! is_paged() ): ?>
		<?php if( !( birdfield_headerslider())): ?>
			<section id="wall" class="no-image"></section>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( have_posts()) : ?>
		<section id="blog">
			<div class="container">
				<h2><a href="#">農園会だより</a></h2>

				<ul class="article">
				<?php while ( have_posts()) : the_post(); ?>
					<?php get_template_part( 'content', 'home' ); ?>
				<?php endwhile; ?>
				</ul>
				<div class="more"><a href="#" >「ブログ」をもっと見る</a></div>
			</div>
		</section>
	<?php endif; ?>

	<?php if( ! is_paged()): ?>
		<?php
			$args = array(
				'post_type' => 'page',
				'tag' => 'information',
				'post_status' => 'publish'
			);
			$the_query = new WP_Query($args);
			if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();
		?>

		<section class="information <?php  echo get_post_field( 'post_name', get_the_ID() ); ?>">
			<div class="container">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php
					$more_text = '「' .get_the_title() .'」を詳しく見る';
					$more_url = get_the_permalink();
				?>

				<?php
					if( !( false === strpos( $post->post_name, 'fruit' ) ) ){
						echo do_shortcode('[miyazaki_en_fruits_list]');
					}
					else{
						the_content('');
					}
				?>

				<div class="more"><a href="<?php echo $more_url; ?>"><?php echo $more_text; ?></a></div>

			</div>
		</section>

		<?php endwhile;
			wp_reset_postdata();
			endif;
		?>

		<?php
			$args = array(
				'post_type' => 'vegetable',
				'meta_key' => '_thumbnail_id',
				'posts_per_page' => 6,
				'orderby' => 'random',
				'post_status' => 'publish'
				);
			$the_query = new WP_Query($args);
			if ( $the_query->have_posts() ) :
		?>

		<?php $more_url = get_post_type_archive_link( 'vegetable' );
				$more_text = get_post_type_object( 'vegetable' )->labels->singular_name;;
		?>
		<section class="information">
			<div class="container">
				<h2><a href="<?php echo $more_url; ?>"><?php echo $more_text; ?></a></h2>
				<div class="tile">

				<?php while ( $the_query->have_posts() ) : $the_query->the_post();
					get_template_part( 'content', 'vegetable' );
				?>

		<?php endwhile;
			wp_reset_postdata();
		?>
				</div>
				<div class="more"><a href="<?php echo esc_html( $more_url ); ?>"><?php echo esc_html( $more_text ); ?>をもっと見る</a></div>
			</div>
		</section>

		<?php endif; ?>

		<section class="information">
		<img src="/wp-content/themes/fureainouen/images/map.jpg" alt="地図" style="width: 100%;">
		</section>

	<?php endif; ?>

	<?php birdfield_content_footer(); ?>
</div>

<?php get_footer(); ?>
