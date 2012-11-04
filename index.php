<?php get_header(); ?>

    <div id="posts" class="span9">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article>
                        <div class="inner">
                            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <p><?php the_content(__('Leer más')); ?></p>
                        </div>
                        <?php if (!is_page()): ?>
                            <div class="date">
                                <?php if (get_the_date('Y') != date('Y')): ?>
                                    <?php the_date('j M Y'); ?>
                                <?php else: ?>
                                    <?php the_date('j M'); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </article>
                    <?php comments_template( '', true ); ?>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php global $wp_query; ?>
            <?php if ($wp_query->max_num_pages > 1): ?>
                <nav>
                    <div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Más antigüos', 'twentyeleven')); ?></div>
                    <div class="nav-next"><?php previous_posts_link(__('Más nuevos <span class="meta-nav">&rarr;</span>', 'twentyeleven')); ?></div>
                </nav>
            <?php endif; ?>
        </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
