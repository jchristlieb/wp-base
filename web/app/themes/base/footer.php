<footer class="container-fluid push-to-button bg-neutral-20 p-0 mt-4">
    <div class="container p-4">
        <div class="row">
            <div class="col-12 col-sm-6 d-flex justify-content-center">
                <div>
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
            </div>
            <div class="col-12 col-sm-6 d-flex justify-content-center">
                <div>
                    <h4>Social Media</h4>
                    <ul class="navbar-nav">
                        <li class="pt-2 pb-2"><a class="nav-links" href="" target="_blank"><i
                                        class="fab fa-facebook pr-2"></i>Facebook</a></li>
                        <li class="pt-2 pb-2"><a class="nav-links" href="" target="_blank"><i
                                        class="fab fa-twitter pr-2"></i>Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-neutral-70 m-0">
        <div class="container">
            <div class="col-12 tertiary-content text-muted p-2">
                <p class="text-center p-2">Copyright by User © <?php echo date('Y') ?></p>
                <p class="text-center p-2">Entwicklung & Design mit <i class="fas fa-heart"></i> bei <a class="mtcs"
                                                                                                        href="https://janchristlieb.de"
                                                                                                        target="_blank">mtcs.io</a>
                </p>
            </div>
        </div>
    </div>
</footer>


<?php wp_footer(); ?>
</body>
</html>