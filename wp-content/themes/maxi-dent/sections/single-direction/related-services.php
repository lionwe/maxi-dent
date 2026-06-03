<?php
/**
 * Services Types (related services for a direction)
 */

// Section fields
$badge = get_field('services_types_badge_text');
$title = get_field('services_types_title');
$desc = get_field('services_types_description');

// Related services selected on Direction (ACF Relationship)
$related_services = get_field('direction_related_services');

// Normalize to max 7 posts
$services_posts = array();
if ($related_services && is_array($related_services)) {
    $services_posts = array_slice($related_services, 0, 7);
}
?>

<?php if (!empty($services_posts)): ?>
    <section class="services-types-section">
        <div
            class="container container--left-only services-types-section__container services-types-section__container--desktop">
            <div class="services-types-section__left">
                <?php if ($badge): ?>
                    <div class="services-types-section__badge">
                        <span><?= esc_html($badge); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($title): ?>
                    <div class="services-types-section__title-wrap">
                        <h2 class="services-types-section__title"><?= wp_kses_post($title); ?></h2>
                    </div>
                <?php endif; ?>

                <?php if ($desc): ?>
                    <p class="services-types-section__description"><?= esc_html($desc); ?></p>
                <?php endif; ?>
            </div>

            <div class="services-types-section__right services-types-section__right--desktop">
                <div class="swiper services-types-swiper" id="services-types-carousel">
                    <div class="swiper-wrapper">
                        <?php foreach ($services_posts as $related_post): ?>
                            <div class="swiper-slide">
                                <?php
                                get_template_part('templates/service-card', null, [
                                    'post' => $related_post,
                                ]);
                                ?>
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>

                <div class="services-types-carousel__controls">
                    <div class="swiper-pagination services-types-carousel__pagination"></div>
                    <div class="services-types-carousel__navigation">
                        <?php
                        get_template_part('templates/button', null, [
                            'type' => 'nav-prev',
                            'class' => 'services-types-swiper-button-prev',
                            'aria_label' => 'Попередня послуга',
                            'icon' => 'arrow-prev',
                        ]);

                        get_template_part('templates/button', null, [
                            'type' => 'nav-next',
                            'class' => 'services-types-swiper-button-next',
                            'aria_label' => 'Наступна послуга',
                            'icon' => 'arrow-next',
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="container services-types-section__container services-types-section__container--mobile">
            <?php if ($badge): ?>
                <div class="services-types-section__badge">
                    <span><?= esc_html($badge); ?></span>
                </div>
            <?php endif; ?>

            <?php if ($title): ?>
                <div class="services-types-section__title-wrap">
                    <h2 class="services-types-section__title"><?= wp_kses_post($title); ?></h2>
                </div>
            <?php endif; ?>

            <div class="services-types-mobile-grid">
                <?php foreach ($services_posts as $related_post): ?>
                    <?php
                    get_template_part('templates/service-card', null, [
                        'post' => $related_post,
                        'modifier' => 'mobile',
                    ]);
                    ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
<?php endif; ?>