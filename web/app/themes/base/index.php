<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
get_template_part('templates/main-nav');
?>

    <div id="primary">
        <main id="main" class="container">

            <div class="container-sm">
                <?php get_template_part('templates/acf_intro') ?>
            </div>

            <div class="container">
                <?php get_template_part('templates/acf_teaser') ?>
            </div>

        </main>
    </div>

<?php
get_footer();
