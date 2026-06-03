<?php
/**
 * About Section
 */

// About section fields
$about_badge_text = get_field('about_badge_text');
$about_title = get_field('about_title');
$about_stat_1_number = get_field('about_stat_1_number');
$about_stat_1_text = get_field('about_stat_1_text');
$about_stat_2_number = get_field('about_stat_2_number');
$about_stat_2_text = get_field('about_stat_2_text');
$about_stat_3_number = get_field('about_stat_3_number');
$about_stat_3_text = get_field('about_stat_3_text');
$about_description_1 = get_field('about_description_1');
$about_description_2 = get_field('about_description_2');
$about_image_left = get_field('about_image_left');
$about_image_right = get_field('about_image_right');
$about_image_tall = get_field('about_image_tall');
$about_services = get_field('about_services');
?>

<section class="about-section" id="about">
  <div class="container">

    <!-- Header -->
    <div class="about-header">
      <div class="about-header-left">
        <?php if ($about_badge_text): ?>
          <div class="about-badge">
            <span><?php echo esc_html($about_badge_text); ?></span>
          </div>
        <?php endif; ?>
        <?php if ($about_title): ?>
          <h2 class="about-title"><?php echo esc_html($about_title); ?></h2>
        <?php endif; ?>
      </div>
      <!-- Desktop Stats -->
      <div class="about-stats about-stats--desktop">
        <?php if ($about_stat_1_number || $about_stat_1_text): ?>
          <div class="about-stats-item">
            <p class="about-stats-item__number"><?php echo esc_html($about_stat_1_number); ?></p>
            <p class="about-stats-item__text"><?php echo esc_html($about_stat_1_text); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($about_stat_2_number || $about_stat_2_text): ?>
          <div class="about-stats-item">
            <p class="about-stats-item__number"><?php echo esc_html($about_stat_2_number); ?></p>
            <p class="about-stats-item__text"><?php echo esc_html($about_stat_2_text); ?></p>
          </div>
        <?php endif; ?>
        <?php if ($about_stat_3_number || $about_stat_3_text): ?>
          <div class="about-stats-item">
            <p class="about-stats-item__number"><?php echo esc_html($about_stat_3_number); ?></p>
            <p class="about-stats-item__text"><?php echo esc_html($about_stat_3_text); ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Content -->
    <div class="about-content">

      <!-- Left side -->
      <div class="about-content-left">
        <!-- Descriptions -->
        <div class="about-descriptions">
          <?php if ($about_description_1): ?>
            <div class="about-description">
              <?php echo wp_kses_post($about_description_1); ?>
            </div>
          <?php endif; ?>
          <?php if ($about_description_2): ?>
            <div class="about-description">
              <?php echo wp_kses_post($about_description_2); ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- Статистика для мобільних -->
        <div class="about-stats about-stats--mobile">
          <?php if ($about_stat_1_number || $about_stat_1_text): ?>
            <div class="about-stats-item">
              <p class="about-stats-item__number"><?php echo esc_html($about_stat_1_number); ?></p>
              <p class="about-stats-item__text"><?php echo esc_html($about_stat_1_text); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($about_stat_2_number || $about_stat_2_text): ?>
            <div class="about-stats-item">
              <p class="about-stats-item__number"><?php echo esc_html($about_stat_2_number); ?></p>
              <p class="about-stats-item__text"><?php echo esc_html($about_stat_2_text); ?></p>
            </div>
          <?php endif; ?>
          <?php if ($about_stat_3_number || $about_stat_3_text): ?>
            <div class="about-stats-item">
              <p class="about-stats-item__number"><?php echo esc_html($about_stat_3_number); ?></p>
              <p class="about-stats-item__text"><?php echo esc_html($about_stat_3_text); ?></p>
            </div>
          <?php endif; ?>
        </div>
        <!-- Bottom images -->
        <div class="about-images-bottom">
          <?php if ($about_image_left): ?>
            <div class="about-image-with-services">
              <img src="<?php echo esc_url($about_image_left); ?>" alt="" loading="lazy">
              <?php if ($about_services): ?>
                <div class="about-services">
                  <?php foreach ($about_services as $service): ?>
                    <div class="about-service-badge">
                      <span><?php echo esc_html($service['service_name']); ?></span>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php if ($about_image_right): ?>
            <div class="about-image-simple">
              <img src="<?php echo esc_url($about_image_right); ?>" alt="" loading="lazy">
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Right side -->
      <div class="about-content-right">
        <?php if ($about_image_tall): ?>
          <div class="about-image-tall">
            <img src="<?php echo esc_url($about_image_tall); ?>" alt="" loading="lazy">
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>