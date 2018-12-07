<header class="container-fluid">
    <div class="container p-0">
        <nav class="navbar navbar-expand-sm navbar-light pt-4">
            <a class="navbar-brand" href="<?= esc_url(home_url('/')) ?>">
                <img class="logo" src="<?= get_stylesheet_directory_uri() . '/assets/images/mtcs.io-logo.webp'; ?>">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <?php
            wp_nav_menu([
                'theme_location' => 'nav__main',
                'depth' => 2,
                'container' => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'navbarSupportedContent',
                'menu_class' => 'nav navbar-nav ml-auto',
                'menu_id' => 'nav__main',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new \Base\BootstrapNavwalker(),
            ]);
            ?>

        </nav>
    </div>
</header>


