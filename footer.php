	<footer id="footer">
		<section id="widget-area">
			<div class="container">
				<div class="left">
					<?php dynamic_sidebar( 'widget-area-footer' ); ?>
				</div>
				<div class="right">
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fita.fureainouen&tabs=timeline&width=460&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=6028400162" width="460" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
			</div>
		</section>

		<div class="container">
			<div class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ) ; ?>">ITA-FUREAINOUEN</a>
				<?php printf( 'Copyright &copy; %s All Rights Reserved.', date("Y") ); ?>
			</div>
		</div>
		<p id="back-top"><a href="#top"><span><?php _e( 'Go Top', 'birdfield' ); ?></span></a></p>
	</footer>

</div><!-- wrapper -->

<?php wp_footer(); ?>

</body>
</html>