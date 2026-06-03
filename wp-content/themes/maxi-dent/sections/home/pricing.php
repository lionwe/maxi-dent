<?php
$pricing_badge_text = get_field('pricing_badge_text');
$pricing_title = get_field('pricing_title');
$pricing_items = get_field('pricing_items');
$pricing_tabs = get_field('pricing_tabs');
$pricing_button_text = get_field('pricing_button_text');
$pricing_button_link = get_field('pricing_button_link');

$current_post_id = get_the_ID();
$pricing_nonce = wp_create_nonce('pricing_tab_nonce');

$bg_right_desktop = get_template_directory_uri() . '/assets/images/pricing-right-bg.webp';
$bg_right_mobile = get_template_directory_uri() . '/assets/images/pricing-right-bg-mobile.webp';
?>

<section class="pricing-section" id="pricing" data-pricing-nonce="<?php echo esc_attr($pricing_nonce); ?>"
  data-pricing-post="<?php echo esc_attr($current_post_id); ?>">
  <div class="container">
    <div class="pricing-header">
      <div class="pricing-header__left">
        <?php if ($pricing_badge_text): ?>
          <div class="pricing-badge">
            <span><?php echo esc_html($pricing_badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($pricing_title): ?>
          <h2 class="pricing-title"><?php echo esc_html($pricing_title); ?></h2>
        <?php endif; ?>
      </div>

      <?php if ($pricing_items): ?>
        <ul class="pricing-list">
          <?php foreach ($pricing_items as $item): ?>
            <?php if (!empty($item['pricing_text'])): ?>
              <li class="pricing-item">
                <span><?php echo esc_html($item['pricing_text']); ?></span>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <div class="pricing-content">
      <div class="pricing-left">
        <div class="pricing-tabs-wrapper">
          <?php if ($pricing_tabs): ?>
            <div class="pricing-tabs" role="tablist">
              <?php foreach ($pricing_tabs as $index => $tab): ?>
                <?php
                $tab_name = $tab['tab_name'] ?? '';
                $is_active = ($index === 0);
                ?>
                <?php if ($tab_name): ?>
                  <button class="pricing-tab <?php echo $is_active ? 'pricing-tab--active' : ''; ?>"
                    role="tab"
                    type="button"
                    aria-selected="<?php echo $is_active ? 'true' : 'false'; ?>"
                    data-tab-index="<?php echo esc_attr($index); ?>">
                    <?php echo esc_html($tab_name); ?>
                  </button>
                <?php endif; ?>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="pricing-button-wrapper">
          <?php
          get_template_part(
            'templates/button',
            null,
            array(
              'text' => $pricing_button_text ?: 'Contact',
              'link' => $pricing_button_link,
              'icon' => 'arrow-down-white',
              'type' => 'secondary',
              'icon_after' => true,
              'class' => 'pricing-button',
            )
          );
          ?>
        </div>
      </div>

      <div class="pricing-right">

        <picture class="pricing-right__bg">
          <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_right_mobile); ?>">
          <img src="<?php echo esc_url($bg_right_desktop); ?>" alt="" loading="lazy">
        </picture>

        <div class="pricing-right__wrapper" id="pricing-wrapper">
          <?php if (!empty($pricing_tabs[0])): ?>
            <div class="pricing-right-content">
              <?php
              get_template_part(
                'templates/pricing-services-list',
                null,
                array(
                  'services' => $pricing_tabs[0]['tab_services'] ?? array(),
                )
              );
              ?>

              <div class="pricing-load-more-wrapper" style="display: none;">
                <?php
                get_template_part(
                  'templates/button',
                  null,
                  array(
                    'text' => 'Більше',
                    'link' => '#',
                    'icon' => 'arrow-down-black',
                    'type' => 'secondary',
                    'icon_after' => true,
                    'class' => 'pricing-button pricing-load-more-btn',
                  )
                );
                ?>
              </div>

              <div class="pricing-mobile-button">
                <?php
                get_template_part(
                  'templates/button',
                  null,
                  array(
                    'text' => $pricing_button_text ?: 'Contact',
                    'link' => $pricing_button_link,
                    'icon' => 'arrow-down-black',
                    'type' => 'primary',
                    'icon_after' => true,
                    'class' => 'pricing-button pricing-button--mobile',
                  )
                );
                ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
