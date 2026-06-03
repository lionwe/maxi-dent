<?php
$results_badge_text = get_field('results_badge_text');
$results_title = get_field('results_title');
$results_items = get_field('results_items');

$bg_card_desktop = get_template_directory_uri() . '/assets/images/results-card-bg.webp';
$bg_card_mobile = get_template_directory_uri() . '/assets/images/results-card-bg-mobile.webp';
?>

<section class="results-section" id="results">
  <div class="container">

    <div class="results-header">
      <div class="results-header__left">
        <?php if ($results_badge_text): ?>
          <div class="results-badge">
            <span><?php echo esc_html($results_badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($results_title): ?>
          <h2 class="results-title"><?php echo esc_html($results_title); ?></h2>
        <?php endif; ?>
      </div>
    </div>

    <?php if ($results_items && count($results_items) > 0): ?>

      <div class="results-grid results-grid--desktop">
        <?php foreach ($results_items as $item): ?>
          <div class="results-card">
            <div class="results-card__front">

              <img src="<?php echo esc_url($bg_card_desktop); ?>" alt="" class="results-card__bg" loading="lazy">

              <div class="results-card__content">
                <div class="results-card__header">
                  <?php get_template_part('templates/button', null, array(
                    'type' => 'results-view',
                    'icon' => 'result-arrow',
                    'aria_label' => 'Переглянути результат',
                  )); ?>

                  <?php if (!empty($item['result_title'])): ?>
                    <p class="results-card__title">
                      <?php echo esc_html($item['result_title']); ?>
                    </p>
                  <?php endif; ?>
                </div>

                <p class="results-card__hint">
                  *тисни, щоб побачити до/після
                </p>
              </div>
            </div>

            <div class="results-card__back">
              <?php if (!empty($item['result_image'])): ?>
                <img src="<?php echo esc_url($item['result_image']); ?>"
                  alt="<?php echo esc_attr($item['result_title'] ?? ''); ?>" class="results-card__image" loading="lazy">
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="results-swiper-wrapper results-swiper--mobile">
        <div class="swiper results-swiper-mobile">
          <div class="swiper-wrapper">
            <?php foreach ($results_items as $item): ?>
              <div class="swiper-slide">
                <div class="results-card">
                  <div class="results-card__front">

                    <img src="<?php echo esc_url($bg_card_mobile); ?>" alt="" class="results-card__bg" loading="lazy">

                    <div class="results-card__content">
                      <div class="results-card__header">
                        <?php get_template_part('templates/button', null, array(
                          'type' => 'results-view',
                          'icon' => 'result-arrow',
                          'aria_label' => 'Переглянути результат',
                        )); ?>

                        <?php if (!empty($item['result_title'])): ?>
                          <p class="results-card__title">
                            <?php echo esc_html($item['result_title']); ?>
                          </p>
                        <?php endif; ?>
                      </div>

                      <p class="results-card__hint">
                        *тисни, щоб побачити до/після
                      </p>
                    </div>
                  </div>

                  <div class="results-card__back">
                    <?php if (!empty($item['result_image'])): ?>
                      <img src="<?php echo esc_url($item['result_image']); ?>"
                        alt="<?php echo esc_attr($item['result_title'] ?? ''); ?>" class="results-card__image" loading="lazy">
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="results-carousel__controls">
          <div class="results-carousel__navigation">
            <?php
            get_template_part('templates/button', null, array(
              'type' => 'nav-prev',
              'class' => 'results-swiper-button-prev',
              'icon' => 'arrow-prev',
            ));
            ?>
            <?php
            get_template_part('templates/button', null, array(
              'type' => 'nav-next',
              'class' => 'results-swiper-button-next',
              'icon' => 'arrow-next',
            ));
            ?>
          </div>

          <div class="swiper-pagination results-carousel__pagination"></div>
        </div>
      </div>

    <?php endif; ?>

  </div>
</section>