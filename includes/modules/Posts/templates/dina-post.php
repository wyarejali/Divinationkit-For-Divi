<?php

    $thumbnail    = '';
    $author    = '';
    $date      = '';
    $separator = '';
    $excerpt   = '';
    $meta      = '';


    if( $args[ 'show_thumbnail' ] === 'on') {
        $thumbnail = sprintf(
            '<a href="<?php the_permalink() ?>">
                <img src="%1$s" alt="">
            </a>',
            get_the_post_thumbnail_url()
        );
    }


    return sprintf(
        '<article>
            %1$s
            <div class="dina_posts-content-wrapper">
                <h2 class="dina_posts-title">%2$s</h2>
                <div class="dina_posts-meta">
                </div>

                <p class="dina_posts-content">
                    <?php echo get_the_content(); ?>
                </p>
            </div>
        </article>',
        $thumbnail,
        et_core_intentionally_unescaped( get_the_title(), 'html' )
    );
?>


<?php
