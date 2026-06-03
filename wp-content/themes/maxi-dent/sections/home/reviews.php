<?php
$reviews_badge_text = get_field('reviews_badge_text');
$reviews_title = get_field('reviews_title');
?>

<section class="reviews-section" id="reviews">
  <div class="container container--left-only">

    <div class="reviews-left">
      <?php if ($reviews_badge_text): ?>
        <div class="reviews-badge">
          <span><?php echo esc_html($reviews_badge_text); ?></span>
        </div>
      <?php endif; ?>

      <?php if ($reviews_title): ?>
        <h2 class="reviews-title"><?php echo esc_html($reviews_title); ?></h2>
      <?php endif; ?>
    </div>

    <div class="reviews-right">
      <div class="grw-widget-container">
        <?php echo do_shortcode('[grw id=793]'); ?>
      </div>

      <div class="swiper reviews-swiper" id="reviews-carousel">
        <div class="swiper-wrapper">
          <!-- slides cloned from GRW by JS -->
        </div>
      </div>

      <div class="reviews-carousel__controls">
        <div class="swiper-pagination reviews-carousel__pagination"></div>

        <div class="reviews-carousel__navigation">
          <?php
          get_template_part('templates/button', null, array(
            'type' => 'nav-prev',
            'class' => 'reviews-swiper-button-prev',
            'aria_label' => 'Попередній відгук',
            'icon' => 'arrow-prev',
          ));

          get_template_part('templates/button', null, array(
            'type' => 'nav-next',
            'class' => 'reviews-swiper-button-next',
            'aria_label' => 'Наступний відгук',
            'icon' => 'arrow-next',
          ));
          ?>
        </div>
      </div>
    </div>

  </div>
</section>