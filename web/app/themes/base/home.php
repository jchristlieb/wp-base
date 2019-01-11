<?php

get_header();
get_template_part('templates/main-nav');
?>

    <div id="primary">
        <main id="main" class="container-fluid p-0">

            <div class="container-sm">
                <div class="jumbotron m-4 text-center">
                    <h1 class="display-4"><?php wp_title('') ?></h1>
                </div>
            </div>

            <!--main part-->
            <div class="container">
                <div class="row">

                    <!--post teaser-->
                    <div class="col-12 col-md-8 pr-md-4">
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

                    <!--sidebar-->
                    <aside class="col-12 col-md-4 pl-md-4">
                        <?php
                        $args = array(
                            'orderby' => 'count',
                        );
                        $terms = get_terms('category', $args);
                        ?>

                        <h2>Themen</h2>
                        <ul class="nav flex-column">

                            <?php

                            foreach ($terms as $term) : ?>

                                <li class="nav-item pt-2"><a class="text-neutral-80"
                                                             href="<?php echo get_term_link($term); ?>"><i
                                                class="fal fa-tag text-primary-80 pr-2"></i><?php echo $term->name . ' (' .
                                            $term->count . ')'; ?>
                                    </a></li>
                            <?php endforeach;
                            wp_reset_query() ?>
                        </ul>
                    </aside>

                </div>
            </div>

        </main>
    </div>

<?php
get_footer();
