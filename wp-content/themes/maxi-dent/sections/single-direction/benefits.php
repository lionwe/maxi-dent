<?php
/**
 * Service Benefits Section
 */

$badge_text = get_field('service_benefits_badge_text');
$title = get_field('service_benefits_title');
$description = get_field('service_benefits_description_text');
$items = get_field('service_benefits_items');
$image = get_field('service_benefits_right_image');

$bg_image_url = get_template_directory_uri() . '/assets/images/direction-benefits.webp';
?>

<section class="service-benefits">

  <img src="<?php echo esc_url($bg_image_url); ?>" alt="" class="service-benefits__bg" loading="lazy">

  <div class="container">

    <div class="service-benefits__header">
      <div class="service-benefits__header-left">
        <?php if ($badge_text): ?>
          <div class="service-benefits__badge">
            <span><?php echo esc_html($badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($title): ?>
          <h2 class="service-benefits__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
      </div>

      <?php if ($description): ?>
        <div class="service-benefits__description">
          <p><?php echo esc_html($description); ?></p>
        </div>
      <?php endif; ?>
    </div>

    <div class="service-benefits__content service-benefits__content--desktop">
      <div class="service-benefits__left">
        <?php if ($items): ?>
          <div class="service-benefits__grid">
            <?php foreach (array_slice($items, 0, 4) as $index => $item): ?>
              <div class="service-benefits__card">
                <div class="service-benefits__card-number">
                  <span><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></span>
                </div>
                <div class="service-benefits__card-icon">
                  <?php if (!empty($item['service_icon'])):
                    $icon = $item['service_icon'];
                    $icon_url = is_array($icon) ? $icon['url'] : $icon;
                    echo file_get_contents($icon_url);
                  endif; ?>
                </div>
                <h3 class="service-benefits__card-title">
                  <?php echo esc_html($item['service_name']); ?>
                </h3>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="service-benefits__right">
        <?php if ($image): ?>
          <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
            class="service-benefits__image" loading="lazy" />
        <?php endif; ?>
      </div>
    </div>

    <?php if ($items): ?>
      <div class="sb-swiper sb-swiper--mobile">
        <div class="swiper sb-swiper-mobile">
          <div class="swiper-wrapper">
            <?php foreach ($items as $index => $item): ?>
              <div class="swiper-slide sb-card">
                <div class="sb-card__number">
                  <div class="sb-card__number-inner">
                    <p class="sb-card__number-text"><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></p>
                  </div>
                </div>
                <div class="sb-card__icon">
                  <?php if (!empty($item['service_icon'])):
                    $icon = $item['service_icon'];
                    $icon_url = is_array($icon) ? $icon['url'] : $icon;
                    echo file_get_contents($icon_url);
                  endif; ?>
                </div>
                <h3 class="sb-card__title"><?php echo esc_html($item['service_name']); ?></h3>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="sb-carousel__controls">
          <div class="sb-carousel__navigation">
            <?php
            get_template_part('templates/button', null, [
              'type' => 'nav-prev',
              'class' => 'sb-swiper-button-prev',
              'aria_label' => 'Назад',
              'icon' => 'arrow-prev'
            ]);
            ?>
            <?php
            get_template_part('templates/button', null, [
              'type' => 'nav-next',
              'class' => 'sb-swiper-button-next',
              'aria_label' => 'Вперед',
              'icon' => 'arrow-next'
            ]);
            ?>
          </div>
          <div class="swiper-pagination sb-carousel__pagination"></div>
        </div>
      </div>
    <?php endif; ?>

    <div class="service-benefits__image-mobile">
      <?php if ($image): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"
          class="service-benefits__image" loading="lazy" />
      <?php endif; ?>
    </div>

  </div>
</section>