<?php

get_header();
get_template_part('templates/main-nav');
?>

    <div id="primary">
        <main id="main" class="container">

            <div class="container-sm">
                <div class="jumbotron text-center">
                    <h1 class="mt-4 mb-4"><?php the_archive_title() ?></h1>
                    <div class="primary-content mb-4"><?php the_archive_description() ?></div>
                </div>
            </div>

            <!--main part-->
            <div class="container-md">
                <div class="row">

                    <!--post teaser-->
                    <div class="col-12">
                        <?php foreach ($posts as $post) {
                            $title = $post->post_title;
                            $content = $post->post_content;
                            $link = get_the_permalink($post->post_id);
                            $author = get_the_author_meta('display_name', $post->post_author);
                            $date = get_the_date('d.n.Y', $post);
                            $categories = get_the_category($post->post_id);
                            $cat_list = array();
                            foreach ($categories as $category) {
                                $cat_list[] = $category->name;
                            };
                            $category_names = implode(", ", $cat_list);
                            $image_url = get_the_post_thumbnail_url($post->post_id, '1200x400');
                            $image_title = get_the_title(get_post_thumbnail_id($post->post_id));
                            $image_alt = get_post_meta((get_post_thumbnail_id($post->post_id)), '_wp_attachment_image_alt',
                                true);
                            ?>

                            <article class="card mb-50">
                                <a href="<?php echo $link; ?>">
                                    <img class="rounded-top img-fluid" src="<?php echo $image_url ?>"
                                         title="<?php echo
                                         $image_title ?>"
                                         alt="<?php
                                         echo $image_alt ?>">
                                    <div class="card-body">
                                        <h2 class="card-title text-primary-80"><?php echo $title ?></h2>
                                        <p class="text-muted mb-2"><?php echo $date . ' von ' . $author . ' in ' . $category_names; ?></p>
                                        <p class="secondary-content text-neutral-80"><?php echo mb_strimwidth($content, 0, 200, ' [...]'); ?></p>
                                    </div>
                                </a>
                            </article>


                        <?php }
                        wp_reset_query(); ?>
                    </div>

                </div>
            </div>

        </main>
    </div>

<?php
get_footer();
