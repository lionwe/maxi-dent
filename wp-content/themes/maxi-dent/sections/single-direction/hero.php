<?php
/**
 * Single Service - Hero Section
 */

$hero_text_content = get_field('hero_text_content');
$button_text = get_field('button_text');
$button_link = get_field('hero_button_custom_link');
$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<section class="single-service-hero" <?php if ($featured_image): ?>
    style="background-image: url('<?php echo esc_url($featured_image); ?>');" <?php endif; ?>>
  <div class="container">

    <?php
    get_template_part('templates/breadcrumbs', null, array(
      'current_title' => get_the_title(),
      'home_url' => home_url('/'),
      'home_text' => 'Головна сторінка',
    ));
    ?>

    <div class="single-service-hero__content single-service-hero__content--desktop">
      <div class="single-service-hero__left">

        <div class="single-service-hero__text-content">
          <?php echo $hero_text_content; ?>
        </div>

        <?php if ($service_short_description): ?>
          <p class="single-service-hero__description-desktop">
            <?php echo esc_html($service_short_description); ?>
          </p>
        <?php endif; ?>

        <div class="single-service-hero__meta">
          <?php
          get_template_part('templates/button', null, array(
            'text' => $button_text ?: 'Записатись на консультацію',
            'link' => $button_link ?: '#',
            'icon' => "arrow-down-black",
            'type' => 'primary',
            'icon_after' => true,
            'class' => 'hero-button',
            'aria_label' => 'Записатись на консультацію',
          ));
          ?>
        </div>
      </div>

      <div class="single-service-hero__right">
        <div class="single-service-hero__cards">
          <?php get_template_part('templates/hero-schedule'); ?>
          <?php get_template_part('templates/hero-address'); ?>
        </div>
        <?php get_template_part('templates/hero-stats'); ?>
      </div>
    </div>

    <div class="single-service-hero__content single-service-hero__content--mobile">
      <div class="single-service-hero__mobile-top">
        <div class="single-service-hero__text-content-mobile">
          <?php echo $hero_text_content; ?>
        </div>

        <?php if ($service_short_description): ?>
          <p class="single-service-hero__description-mobile">
            <?php echo esc_html($service_short_description); ?>
          </p>
        <?php endif; ?>
      </div>

      <div class="single-service-hero__cards-mobile">
        <?php get_template_part('templates/hero-schedule'); ?>
        <?php get_template_part('templates/hero-address'); ?>
      </div>

      <?php get_template_part('templates/hero-stats'); ?>

      <?php
      get_template_part('templates/button', null, array(
        'text' => $button_text ?: 'Записатись на консультацію',
        'link' => $button_link ?: '#',
        'icon' => 'arrow-down-black',
        'type' => 'primary',
        'icon_after' => true,
        'class' => 'hero-button',
        'aria_label' => 'Записатись на консультацію',
      ));
      ?>
    </div>
  </div>
</section>