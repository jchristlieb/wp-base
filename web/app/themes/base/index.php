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

    <div id="primary" class="content-area">
        <main id="main" class="test-class site-main container">
            <h1>Hello World</h1>
        </main>
    </div>

<?php
get_footer();
