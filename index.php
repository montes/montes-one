<?php get_header(); ?>

    <div id="posts" class="span9">
            <?php if (have_posts()): ?>
                <?php while (have_posts()): the_post(); ?>
                    <article>
                        <div class="inner">
                            <?php if ($wp_query->post_count == 1): ?>
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            <?php else: ?>
                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <?php endif; ?>
                            <p><?php the_content(__('Read more', 'montes-one')); ?></p>
                        </div>
                        <?php if (!is_page()): ?>
                            <div class="date">
                                <?php if (get_the_date('Y') != date('Y')): ?>
                                    <?php if (stripos(get_bloginfo("language"), 'es-') !== false): ?>
                                        <?php the_date('j M Y'); ?>
                                    <?php else: ?>
                                        <?=get_the_date()?>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if (stripos(get_bloginfo("language"), 'es-') !== false): ?>
                                        <?php the_date('j M'); ?>
                                    <?php else: ?>
                                        <?=get_the_date()?>
                                    <?php endif; ?>
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
                    <div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> ' . __('Older posts', 'montes-one')); ?></div>
                    <div class="nav-next"><?php previous_posts_link(__('Newer posts', 'montes-one') . ' <span class="meta-nav">&rarr;</span>'); ?></div>
                </nav>
            <?php endif; ?>
        </div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
