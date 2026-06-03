<?php
/**
 * Single Service Reviews Section
 */

$badge_text = get_field('service_reviews_badge_text');
$text_content = get_field('service_reviews_text_content'); 
?>
<section class="single-service-reviews">
  <div class="container">

    <div class="single-service-reviews__header">
      <div class="single-service-reviews__header-left">
        <?php if ($badge_text): ?>
          <div class="single-service-reviews__badge">
            <span><?php echo esc_html($badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($text_content): ?>
          <div class="single-service-reviews__title-row">
            <?php echo $text_content; ?>
            <div class="single-service-reviews__line" aria-hidden="true"></div>
          </div>
        <?php endif; ?>
      </div>

      <div class="single-service-reviews__header-right">
        <div class="single-service-reviews__nav">
          <?php
          // Desktop prev button
          get_template_part(
            'templates/button',
            null,
            array(
              'type' => 'nav-prev',
              'class' => 'single-service-reviews-button-prev',
              'aria_label' => 'Попередній відгук',
              'icon' => 'arrow-prev',
            )
          );
          // Desktop next button
          get_template_part(
            'templates/button',
            null,
            array(
              'type' => 'nav-next',
              'class' => 'single-service-reviews-button-next',
              'aria_label' => 'Наступний відгук',
              'icon' => 'arrow-next',
            )
          );
          ?>
        </div>
      </div>
    </div>

    <div class="single-service-reviews__grid">
      <div class="grw-widget-container" aria-hidden="true">
        <?php echo do_shortcode('[grw id=793]'); ?>
      </div>

      <div class="swiper single-service-reviews-swiper" aria-label="Відгуки">
        <div class="swiper-wrapper"></div>
      </div>

      <div class="swiper-pagination single-service-reviews-pagination" aria-label="Пагінація відгуків"></div>

      <div class="single-service-reviews__nav single-service-reviews__nav--mobile">
        <?php
        get_template_part(
          'templates/button',
          null,
          array(
            'type' => 'nav-prev',
            'class' => 'single-service-reviews-button-prev-mobile',
            'aria_label' => 'Попередній відгук',
            'icon' => 'arrow-prev',
          )
        );

        get_template_part(
          'templates/button',
          null,
          array(
            'type' => 'nav-next',
            'class' => 'single-service-reviews-button-next-mobile',
            'aria_label' => 'Наступний відгук',
            'icon' => 'arrow-next',
          )
        );
        ?>
      </div>
    </div>
  </div>
</section>