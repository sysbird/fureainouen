	<footer id="footer">
		<section id="widget-area">
			<div class="container">
				<div class="left">
					<?php dynamic_sidebar( 'widget-area-footer' ); ?>
				</div>
				<div class="right">
				</div>
			</div>
		</section>

		<div class="container">
			<div class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ) ; ?>">ITA-FUREAINOUEN</a>
				<?php printf( 'Copyright &copy; %s All Rights Reserved.', birdfield_get_copyright_year() ); ?>
			</div>
		</div>
		<p id="back-top"><a href="#top"><span><?php _e( 'Go Top', 'birdfield' ); ?></span></a></p>
	</footer>

</div><!-- wrapper -->

<?php wp_footer(); ?>

</body>
</html>