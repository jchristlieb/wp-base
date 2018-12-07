<footer class="container-fluid push-to-button bg-grey-30 p-0">
    <div class="container p-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <h4>MTCS.io</h4>


                <?php
                wp_nav_menu([
                    'theme_location' => 'nav__footer',
                    'depth' => 2,
                    'container' => 'div',
                    'container_class' => '',
                    'container_id' => 'navbarSupportedContent',
                    'menu_class' => 'nav navbar-nav ml-auto',
                    'menu_id' => 'nav__footer',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new \Base\BootstrapNavwalker(),
                ]);
                ?>

            </div>
            <div class="col-12 col-md-6 mt-md-0 mt-4">
                <h4>Social Media</h4>
                <ul class="navbar-nav">
                    <li class="pt-2 pb-2"><a class="nav-links" href="" target="_blank"><i class="fab fa-facebook pr-2"></i>Facebook</a></li>
                    <li class="pt-2 pb-2"><a class="nav-links" href="" target="_blank"><i class="fab fa-twitter pr-2"></i>Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-grey-70 m-0">
        <div class="container">
            <div class="col-12 p-4">
                <p class="text-center text-grey-40 m-0">Copyright by User © <?php echo date('Y')?></p>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>