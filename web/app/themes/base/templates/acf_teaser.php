<section class="section-teaser">
    <div class="row">

        <?php if (have_rows('teaser')) :

            while (have_rows('teaser')) : the_row();

                $img_object = get_sub_field('image');
                $size = '400x225';
                $image = $img_object['sizes'][$size];
                $alt = $img_object['alt'];
                $title = $img_object['title'];
                $headline = get_sub_field('headline');
                $link = get_sub_field('link');
                $body = get_sub_field('body');

                ?>

                <div class="col-12 col-sm-6">
                    <div class="card teaser shadow-hover-effect mt-4 mb-4">
                        <a href="<?php echo $link ?>">
                            <img class="card-img-top" src="<?php echo $image ?>" alt="<?php echo $alt ?>"
                                 title="<?php echo $title ?>">
                            <div class="card-body">
                                <h3 class="card-title text-primary-80 text-center m-0"><?php echo $headline ?></h3>
                                <?php if ($body != '') : ?>
                                    <p class="card-body text-neutral-80"><?php echo $body ?></p>
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                </div>

            <?php endwhile;

        endif


        ?>
    </div>
</section>
