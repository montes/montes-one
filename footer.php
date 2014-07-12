

			</div> <!-- /.row -->

        </div> <!-- /.container -->

		<div class="container">
			<div class="row">
				<div class="span12">
					<?php if (!dynamic_sidebar('footer-sidebar')) : ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

        <hr>
        <footer>&copy; Montes 2012</footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?=get_bloginfo('template_url')?>/js/vendor/jquery-1.8.2.min.js"><\/script>')</script>

        <script src="<?=get_bloginfo('template_url')?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?=get_bloginfo('template_url')?>/js/plugins.js"></script>
        <script src="<?=get_bloginfo('template_url')?>/js/main.js"></script>

        <?php wp_footer(); ?>

    </body>
</html>
