<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php
  // Global options
  $phone = get_field('phone', 'option');
  $theme_uri = get_template_directory_uri();
  $phone_icon = $theme_uri . '/assets/images/svg/phone.svg';
  $burger_svg = $theme_uri . '/assets/images/svg/burger-icon.svg';
  $close_svg = $theme_uri . '/assets/images/svg/close-icon.svg';
  ?>

  <header class="page-header page-header--simple">
    <div class="container">
      <div class="page-header-surface">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="header-logo">
          <?php the_custom_logo(); ?>
        </a>

        <div class="header-nav-wrapper">
          <nav class="header-menu" aria-label="Головне меню">
            <?php get_template_part('templates/navigation'); ?>
          </nav>

          <?php if ($phone): ?>
            <a href="tel:<?php echo esc_attr(str_replace(' ', '', $phone)); ?>" class="header-phone-btn">
              <?php if (!empty($phone_icon)): ?>
                <img src="<?php echo esc_url($phone_icon); ?>" alt="Телефон" class="header-phone-btn__icon" loading="lazy">
              <?php endif; ?>
              <span class="header-phone-btn__text">
                <?php echo esc_html($phone); ?>
              </span>
            </a>
          <?php endif; ?>
        </div>

        <button class="header-burger js-burger-open" type="button" aria-label="Відкрити меню">
          <img src="<?php echo esc_url($burger_svg); ?>" alt="" class="header-burger__icon" width="31" height="15">
        </button>
      </div>
    </div>
  </header>



  <!-- Mobile burger menu -->
  <div class="backdrop burger">
    <div class="burger-menu">
      <button class="burger-menu__close js-burger-close" type="button" aria-label="Закрити меню">
        <img src="<?php echo esc_url($close_svg); ?>" alt="" class="burger-menu__close-icon" width="16" height="16">
      </button>

      <div class="burger-menu__divider"></div>

      <nav class="burger-menu__nav" aria-label="Мобільне меню">
        <?php get_template_part('templates/navigation'); ?>
      </nav>

      <div class="burger-menu__actions">
        <?php
        if ($phone) {
          get_template_part(
            'templates/button',
            null,
            array(
              'text' => $phone,
              'link' => 'tel:' . str_replace(' ', '', $phone),
              'icon' => 'arrow-down-black',
              'type' => 'primary',
              'icon_after' => false,
              'class' => 'burger-menu__btn burger-menu__btn--primary',
            )
          );
        }

        $header_cta_text = get_field('header_cta_text', 'option');
        $header_cta_link = get_field('header_cta_link', 'option');

        if ($header_cta_text && $header_cta_link) {
          get_template_part(
            'templates/button',
            null,
            array(
              'text' => $header_cta_text,
              'link' => $header_cta_link,
              'icon' => 'arrow-down-white',
              'type' => 'secondary',
              'icon_after' => true,
              'class' => 'burger-menu__btn burger-menu__btn--secondary',
            )
          );
        }
        ?>
      </div>

    </div>
  </div>