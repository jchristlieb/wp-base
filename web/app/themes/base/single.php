<?php

get_header();
get_template_part('templates/main-nav');

$post = get_post();
$title = $post->post_title;
$content = $post->post_content;
$author = get_the_author_meta('display_name', $post->post_author);
$date = get_the_date('F, Y', $post);
$categories = get_the_category($post);
$cat_list = array();
foreach ($categories as $category) {
    $cat_list[] = $category->name;
};
$category_names = implode(", ", $cat_list);
$image_url = get_the_post_thumbnail_url($post, '1200x400');
$image_title = get_the_title(get_post_thumbnail_id($post));
$image_alt = get_post_meta((get_post_thumbnail_id($post)), '_wp_attachment_image_alt',
    true);


while (have_posts()) : the_post(); ?>

    <div id="primary">

        <header class="container-sm">
            <div class="jumbotron m-4 text-center">
                <h1 class="display-4"><?php echo $title ?></h1>
                <p class="tertiary-content"><?php echo $date . ' von ' . $author . ' in ' . $category_names; ?></p>
            </div>
        </header>
        <?php if ($image_url != '') : ?>
            <div class="container-md">
                <img class="rounded img-fluid mt-4 mb-4" src="<?php echo $image_url ?>" title="<?php echo
                $image_title ?>" alt="<?php echo $image_alt ?>">
            </div>
        <?php endif; ?>
        <article class="container-sm">
            <p class="secondary-content text-justify m-2"><?php echo $content ?></p>
        </article>

    </div>

<?php endwhile;
get_footer();
