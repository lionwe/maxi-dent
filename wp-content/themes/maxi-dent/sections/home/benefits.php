<?php
/**
 * Benefits section
 */

$benefits_badge_text = get_field('benefits_badge_text');
$benefits_title = get_field('benefits_title');
$benefits_items = get_field('benefits_items');
$benefits_services = get_field('benefits_services');
$benefits_description = get_field('benefits_description');
$benefits_button_text = get_field('benefits_button_text');
$benefits_button_link = get_field('benefits_button_link');

$bg_desktop = get_template_directory_uri() . '/assets/images/benefits-bg.webp';
$bg_mobile = get_template_directory_uri() . '/assets/images/benefits-mobile-bg.webp';
?>

<section class="benefits-section">

  <picture class="benefits-section__bg">
    <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_mobile); ?>">
    <img src="<?php echo esc_url($bg_desktop); ?>" alt="" class="benefits-section__bg" loading="lazy">
  </picture>

  <div class="container">

    <div class="benefits-header" id="benefits">
      <div class="benefits-header-left">
        <?php if ($benefits_badge_text): ?>
          <div class="benefits-badge">
            <span><?php echo esc_html($benefits_badge_text); ?></span>
          </div>
        <?php endif; ?>
        <?php if ($benefits_title): ?>
          <h2 class="benefits-title"><?php echo esc_html($benefits_title); ?></h2>
        <?php endif; ?>
      </div>
      <?php if ($benefits_items): ?>
        <ul class="benefits-list">
          <?php foreach ($benefits_items as $item): ?>
            <li class="benefits-item">
              <span><?php echo esc_html($item['benefit_text']); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <?php if ($benefits_services): ?>
      <div class="benefits-services benefits-services--desktop">
        <?php foreach (array_slice($benefits_services, 0, 3) as $index => $service): ?>
          <div class="services-card">
            <div class="services-card__number">
              <div class="services-card__number-inner">
                <p class="services-card__number-text"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></p>
              </div>
            </div>
            <div class="services-card__icon-wrapper">
              <?php if (!empty($service['service_icon'])) {
                $icon = $service['service_icon'];
                $icon_url = is_array($icon) ? $icon['url'] : $icon;
                echo file_get_contents($icon_url);
              } ?>
            </div>
            <h3 class="services-card__title"><?php echo esc_html($service['service_name']); ?></h3>
          </div>
        <?php endforeach; ?>

        <div class="services-card services-card--description">
          <?php if ($benefits_description): ?>
            <p class="services-card__description-text"><?php echo wp_kses_post($benefits_description); ?></p>
          <?php endif; ?>
          <div class="services-card__button-wrapper">
            <?php get_template_part('templates/button', null, [
              'text' => $benefits_button_text ?: 'Contact',
              'link' => $benefits_button_link,
              'icon' => "arrow-down-white",
              'type' => 'secondary',
              'icon_after' => true
            ]); ?>
          </div>
        </div>
      </div>

      <?php if (count($benefits_services) > 3): ?>
        <div class="benefits-services benefits-services--second-row benefits-services--desktop">
          <?php foreach (array_slice($benefits_services, 3) as $index => $service): ?>
            <div class="services-card">
              <div class="services-card__number">
                <div class="services-card__number-inner">
                  <p class="services-card__number-text"><?php echo str_pad($index + 4, 2, '0', STR_PAD_LEFT); ?></p>
                </div>
              </div>
              <div class="services-card__icon-wrapper">
                <?php if (!empty($service['service_icon'])) {
                  $icon = $service['service_icon'];
                  $icon_url = is_array($icon) ? $icon['url'] : $icon;
                  echo file_get_contents($icon_url);
                } ?>
              </div>
              <h3 class="services-card__title"><?php echo esc_html($service['service_name']); ?></h3>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

    <div class="benefits-swiper benefits-swiper--mobile">
      <div class="swiper benefits-swiper-mobile">
        <div class="swiper-wrapper">
          <?php if ($benefits_services)
            foreach ($benefits_services as $index => $service): ?>
              <?php if (isset($service['is_special']) && $service['is_special'])
                continue; ?>
              <div class="swiper-slide services-card">
                <div class="services-card__number">
                  <div class="services-card__number-inner">
                    <p class="services-card__number-text"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></p>
                  </div>
                </div>
                <div class="services-card__icon-wrapper">
                  <?php if (!empty($service['service_icon'])) {
                    $icon = $service['service_icon'];
                    $icon_url = is_array($icon) ? $icon['url'] : $icon;
                    echo file_get_contents($icon_url);
                  } ?>
                </div>
                <h3 class="services-card__title"><?php echo esc_html($service['service_name']); ?></h3>
              </div>
            <?php endforeach; ?>
        </div>
      </div>

      <div class="benefits-carousel__controls">
        <div class="benefits-carousel__navigation">
          <?php
          get_template_part('templates/button', null, [
            'type' => 'nav-prev',
            'class' => 'benefits-swiper-button-prev',
            'aria_label' => 'Назад',
            'icon' => 'arrow-prev'
          ]);
          get_template_part('templates/button', null, [
            'type' => 'nav-next',
            'class' => 'benefits-swiper-button-next',
            'aria_label' => 'Вперед',
            'icon' => 'arrow-next'
          ]);
          ?>
        </div>
        <div class="swiper-pagination benefits-carousel__pagination"></div>
      </div>

      <div class="benefits-swiper__desc">
        <?php if ($benefits_description): ?>
          <div class="benefits-swiper__desc-text"><?php echo wp_kses_post($benefits_description); ?></div>
        <?php endif; ?>
        <div class="benefits-swiper__desc-btn">
          <?php get_template_part('templates/button', null, [
            'text' => $benefits_button_text ?: 'Contact',
            'link' => $benefits_button_link,
            'icon' => 'arrow-down-black',
            'type' => 'primary',
            'icon_after' => true
          ]); ?>
        </div>
      </div>
    </div>

  </div>
</section>