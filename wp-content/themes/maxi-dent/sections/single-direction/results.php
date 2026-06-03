<?php
/**
 * Service Results Section
 */

// Get section fields
$badge_text = get_field('service_results_badge_text');
$text_content = get_field('service_results_text_content');
$button_text = get_field('service_results_button_text');
$button_text_collapse = get_field('service_results_button_text_collapse') ?: 'Згорнути результати';
$items = get_field('service_results_items');

$bg_card_desktop = get_template_directory_uri() . '/assets/images/results-card-bg.webp';
$bg_card_mobile = get_template_directory_uri() . '/assets/images/results-card-bg-mobile.webp';

// Check if items exist
if (!$items || !is_array($items) || count($items) === 0) {
    return;
}

$items_limit = 6;
$items_count = count($items);
?>

<section class="sr-section">
    <div class="container">

        <div class="sr-grid sr-grid--desktop">
            <div class="sr-intro">
                <?php if ($badge_text): ?>
                    <div class="sr-badge">
                        <span><?php echo esc_html($badge_text); ?></span>
                    </div>
                <?php endif; ?>

                <?php if ($text_content): ?>
                    <?php echo $text_content; ?>
                <?php endif; ?>

                <?php if ($button_text && $items_count > $items_limit):
                    get_template_part('templates/button', null, array(
                        'text' => $button_text,
                        'link' => '#',
                        'type' => 'secondary',
                        'class' => 'sr-intro__button js-sr-load-more',
                        'icon' => 'arrow-down-white',
                        'icon_after' => true,
                        'aria_label' => esc_attr($button_text),
                        'data_attributes' => array(
                            'text-show' => esc_attr($button_text),
                            'text-hide' => esc_attr($button_text_collapse)
                        )
                    ));
                endif; ?>
            </div>

            <?php foreach ($items as $index => $item):
                // Card logic: hidden if > 6, and marked as "extra" for toggle logic
                $card_class = '';
                if ($index >= $items_limit) {
                    $card_class .= ' sr-card--hidden sr-card--extra';
                }
                ?>
                <div class="sr-card <?php echo esc_attr($card_class); ?>">
                    <div class="sr-card__front">

                        <img src="<?php echo esc_url($bg_card_desktop); ?>" alt="" class="sr-card__bg" loading="lazy">

                        <div class="sr-card__content">
                            <div class="sr-card__header">
                                <?php get_template_part('templates/button', null, array(
                                    'type' => 'results-view',
                                    'icon' => 'result-arrow',
                                    'aria_label' => 'Переглянути результат'
                                )); ?>
                                <p class="sr-card__title">
                                    <?php echo esc_html($item['service_results_item_title']); ?>
                                </p>
                            </div>
                            <p class="sr-card__hint">*тисни, щоб побачити до/після</p>
                        </div>
                    </div>

                    <div class="sr-card__back">
                        <?php if ($item['service_results_item_image']): ?>
                            <img src="<?php echo esc_url($item['service_results_item_image']['url']); ?>"
                                alt="<?php echo esc_attr($item['service_results_item_title']); ?>" class="sr-card__image"
                                loading="lazy">
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="sr-swiper-wrapper sr-swiper--mobile">
            <div class="swiper sr-swiper-mobile">
                <div class="swiper-wrapper">
                    <?php foreach ($items as $item): ?>
                        <div class="swiper-slide">
                            <div class="sr-card">
                                <div class="sr-card__front">

                                    <img src="<?php echo esc_url($bg_card_mobile); ?>" alt="" class="sr-card__bg"
                                        loading="lazy">

                                    <div class="sr-card__content">
                                        <div class="sr-card__header">
                                            <?php get_template_part('templates/button', null, array(
                                                'type' => 'results-view',
                                                'icon' => 'result-arrow',
                                                'aria_label' => 'Переглянути результат'
                                            )); ?>
                                            <p class="sr-card__title">
                                                <?php echo esc_html($item['service_results_item_title']); ?>
                                            </p>
                                        </div>
                                        <p class="sr-card__hint">*тисни, щоб побачити до/після</p>
                                    </div>
                                </div>

                                <div class="sr-card__back">
                                    <?php if ($item['service_results_item_image']): ?>
                                        <img src="<?php echo esc_url($item['service_results_item_image']['url']); ?>"
                                            alt="<?php echo esc_attr($item['service_results_item_title']); ?>"
                                            class="sr-card__image" loading="lazy">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="sr-carousel__controls">
                <div class="sr-carousel__navigation">
                    <?php
                    get_template_part('templates/button', null, array(
                        'type' => 'nav-prev',
                        'class' => 'sr-swiper-button-prev',
                        'icon' => 'arrow-prev',
                        'aria_label' => 'Попередній результат'
                    ));

                    get_template_part('templates/button', null, array(
                        'type' => 'nav-next',
                        'class' => 'sr-swiper-button-next',
                        'icon' => 'arrow-next',
                        'aria_label' => 'Наступний результат'
                    ));
                    ?>
                </div>
                <div class="swiper-pagination sr-carousel__pagination"></div>
            </div>
        </div>

    </div>
</section>