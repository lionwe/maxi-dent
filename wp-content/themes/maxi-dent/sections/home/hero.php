<?php
/**
 * Hero Section
 */

$hero_users_image = get_field('hero_users_image');
$hero_users_number = get_field('hero_users_number');
$hero_users_text = get_field('hero_users_text');
$hero_description = get_field('hero_description');
$hero_title_main = get_field('hero_title_main');
$hero_title_secondary = get_field('hero_title_secondary');
$hero_button_text = get_field('hero_button_text');
$hero_button_link = get_field('hero_button_link');
$hero_image_right = get_field('hero_image_right');
$hero_image_left = get_field('hero_image_left');

$bg_hero_desktop = get_template_directory_uri() . '/assets/images/hero-section-bg.webp';
$bg_hero_mobile = get_template_directory_uri() . '/assets/images/hero-section-bg-mobile.webp';

$section_class = 'hero-section';
?>

<section class="<?php echo esc_attr($section_class); ?>" id="hero">

  <picture class="hero-section__bg">
    <source media="(max-width: 992px)" srcset="<?php echo esc_url($bg_hero_mobile); ?>">
    <img src="<?php echo esc_url($bg_hero_desktop); ?>" alt="" loading="lazy">
  </picture>

  <div class="container">
    <div class="hero-content">
      <div class="hero-content__top">
        <div class="hero-users">
          <?php if ($hero_users_image): ?>
            <img src="<?php echo esc_url($hero_users_image); ?>" alt="Users" class="hero-users__image" loading="lazy">
          <?php endif; ?>
          <div class="hero-users__text">
            <strong><?php echo esc_html($hero_users_number); ?></strong>
            <span><?php echo esc_html($hero_users_text); ?></span>
          </div>
        </div>

        <?php if ($hero_description): ?>
          <p class="hero-description">
            <?php echo esc_html($hero_description); ?>
          </p>
        <?php endif; ?>
      </div>

      <?php if ($hero_title_main || $hero_title_secondary): ?>
        <h1 class="hero-title">
          <?php if ($hero_title_main): ?>
            <span class="hero-title__main"><?php echo esc_html($hero_title_main); ?></span>
          <?php endif; ?>
          <?php if ($hero_title_secondary): ?>
            <strong class="hero-title__secondary"><?php echo esc_html($hero_title_secondary); ?></strong>
          <?php endif; ?>
        </h1>
      <?php endif; ?>

      <div class="hero-cards hero-cards--mobile">
        <?php get_template_part('templates/hero-schedule'); ?>
        <?php get_template_part('templates/hero-address'); ?>
      </div>

      <?php
      get_template_part('templates/button', null, array(
        'text' => $hero_button_text,
        'link' => $hero_button_link,
        'icon' => 'arrow-down-black',
        'type' => 'primary',
        'icon_after' => true,
        'class' => 'hero-button',
      ));
      ?>
    </div>

    <div class="hero-media">
      <div class="hero-media__row hero-media__row--top">
        <?php get_template_part('templates/hero-schedule'); ?>
        <?php if ($hero_image_right): ?>
          <div class="hero-image hero-image--right">
            <img src="<?php echo esc_url($hero_image_right); ?>" alt="" loading="lazy">
          </div>
        <?php endif; ?>
      </div>

      <div class="hero-media__row hero-media__row--bottom">
        <?php if ($hero_image_left): ?>
          <div class="hero-image hero-image--left">
            <img src="<?php echo esc_url($hero_image_left); ?>" alt="" loading="lazy">
          </div>
        <?php endif; ?>
        <?php get_template_part('templates/hero-address'); ?>
      </div>
    </div>
  </div>
</section>