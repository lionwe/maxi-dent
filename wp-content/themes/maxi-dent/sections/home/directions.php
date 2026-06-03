<?php
/**
 * Services Section (Directions)
 */

$services_badge_text = get_field('services_badge_text');
$services_title = get_field('services_title');
$services_button_text = get_field('services_button_text');
$services_button_link = get_field('services_button_link');
$services_description_text = get_field('services_description_text');


$service_posts = new WP_Query(array(
  'post_type' => 'directions',
  'posts_per_page' => 7,
  'orderby' => 'date',
  'order' => 'DESC'
));

$has_section_content = !empty($services_badge_text) || !empty($services_title) || !empty($services_description_text);
$has_posts = $service_posts->have_posts();

if (!$has_section_content && !$has_posts) {
  return;
}
?>

<section class="services-main-section" id="service">
  <div class="container">

    <?php if ($services_badge_text || $services_title): ?>
      <div class="services-main-header">
        <div class="services-main-header-left">
          <?php if ($services_badge_text): ?>
            <div class="services-main-badge">
              <span><?php echo esc_html($services_badge_text); ?></span>
            </div>
          <?php endif; ?>

          <?php if ($services_title): ?>
            <h2 class="services-main-title"><?php echo esc_html($services_title); ?></h2>
          <?php endif; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($has_posts):
      $posts_array = $service_posts->posts;
      ?>
      <div class="services-main-grid">

        <?php foreach ($posts_array as $post): ?>
          <?php
          setup_postdata($post);

          $card_image_acf = get_field('direction_card_image', $post->ID);

          $image_url = '';
          $image_alt = $post->post_title;

          if ($card_image_acf) {
            if (is_array($card_image_acf)) {
              $image_url = $card_image_acf['url'];
              $image_alt = !empty($card_image_acf['alt']) ? $card_image_acf['alt'] : $post->post_title;
            } else {
              $image_url = $card_image_acf;
            }
          }
          ?>

          <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" class="services-main-card">

            <?php if ($image_url): ?>
              <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>"
                class="services-main-card__image" loading="lazy">
            <?php else: ?>
              <div class="services-main-card__image services-main-card__image--placeholder"></div>
            <?php endif; ?>

            <div class="services-main-card__content">
              <?php if ($post->post_title): ?>
                <h3 class="services-main-card__title">
                  <?php echo esc_html($post->post_title); ?>
                </h3>
              <?php endif; ?>

              <hr class="services-main-card__divider">
            </div>
          </a>
        <?php endforeach;
        wp_reset_postdata(); ?>

        <div class="services-main-consultation">
          <div class="services-main-consultation__content">
            <?php if ($services_description_text): ?>
              <p class="services-main-consultation__text">
                <?php echo wp_kses_post($services_description_text); ?>
              </p>
            <?php endif; ?>

            <?php if ($services_button_text && $services_button_link): ?>
              <?php get_template_part('templates/button', null, array(
                'text' => $services_button_text,
                'link' => $services_button_link,
                'type' => 'tertiary'
              )); ?>
            <?php endif; ?>
          </div>
        </div>

      </div>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>

  </div>
</section>