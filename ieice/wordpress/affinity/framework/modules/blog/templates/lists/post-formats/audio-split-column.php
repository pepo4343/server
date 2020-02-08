<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkd-post-content">
        <?php affinity_mikado_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
        <div class="mkd-post-text">
            <div class="mkd-post-text-inner">
                <?php affinity_mikado_get_module_template_part('templates/parts/audio', 'blog'); ?>
                <?php affinity_mikado_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
                <div class="mkd-post-info">
                    <?php affinity_mikado_post_info(array(
                        'date'     => 'yes',
                        'author'   => 'yes',
                        'category' => 'yes',
                        'comments' => 'yes',
                        'share'    => 'yes',
                        'like'     => 'yes'
                    )) ?>
                </div>
                <?php
                affinity_mikado_excerpt();
                $args_pages = array(
                    'before'      => '<div class="mkd-single-links-pages"><div class="mkd-single-links-pages-inner">',
                    'after'       => '</div></div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '%'
                );

                wp_link_pages($args_pages);
                ?>
                <?php affinity_mikado_get_module_template_part('templates/parts/social-share', 'blog'); ?>
            </div>
        </div>
    </div>
</article>