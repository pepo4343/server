<div class="mkd-related-posts-holder">
    <?php if($related_posts && $related_posts->have_posts()) : ?>
        <div class="mkd-related-posts-title">
            <h3><?php esc_html_e('Related Posts', 'affinity'); ?></h3>
        </div>
        <div class="mkd-related-posts-inner clearfix">
            <?php while($related_posts->have_posts()) :
                $related_posts->the_post();
                ?>
                <div class="mkd-related-post">
                    <a href="<?php the_permalink(); ?> ">
                        <div class="mkd-related-post-image">
                            <?php if(has_post_thumbnail()) :
                                the_post_thumbnail();
                            endif; ?>
                        </div>
                    </a>

                    <div class="mkd-related-post-title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title('<h4>', '</h4>'); ?></a>
                    </div>
                </div>
                <?php
            endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata();
    ?>
</div>