<?php
/**
 * Team Card Template
 * 
 * @param array $args {
 *     @type int $post_id Post ID
 *     @type int $counter Post counter
 * }
 */

$post_id = $args['post_id'] ?? 0;
$counter = $args['counter'] ?? 1;

if (!$post_id) return;

$team_experience = get_field('team_experience', $post_id);
?>

<div class="swiper-slide team-carousel__card">
  <div class="team-carousel__image-wrapper">
    <?php if (has_post_thumbnail($post_id)): ?>
      <img src="<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'large')); ?>"
        alt="<?php echo esc_attr(get_the_title($post_id)); ?>" 
        class="team-carousel__image" loading="lazy">
    <?php else: ?>
      <div class="team-carousel__image" style="background: #e0e0e0;"></div>
    <?php endif; ?>

    <div class="team-carousel__overlay-top">
      <div class="team-carousel__experience">
        <div class="team-carousel__experience-label">Досвід роботи</div>
        <div class="team-carousel__experience-value">
          <?php echo esc_html($team_experience ?: 'Н/A'); ?>
        </div>
      </div>

      <div class="team-carousel__number">
        <?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
      </div>
    </div>
  </div>

  <div class="team-carousel__card-content">
    <h3 class="team-carousel__card-title">
      <?php echo esc_html(get_the_title($post_id)); ?>
    </h3>

    <p class="team-carousel__card-description">
      <?php
      $content = wp_trim_words(get_the_content(null, false, $post_id), 20, '...');
      echo wp_kses_post($content);
      ?>
    </p>
  </div>
</div>
