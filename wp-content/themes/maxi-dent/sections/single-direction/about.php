<?php
/**
 * About Service Section
 */

// Get ACF fields
$badge_text = get_field('about_badge_text');
$left_content = get_field('about_left_content'); 
$button_text = get_field('about_button_text');
$button_link = get_field('about_button_link');
$badges = get_field('about_right_badges');
$image_1 = get_field('about_right_image_1');
$image_2 = get_field('about_right_image_2');
$image_3 = get_field('about_right_image_3');
$photos_description = get_field('about_photos_description');
?>

<section class="about-service">
  <div class="container">
    <div class="about-service__content">

      <div class="about-service__left">

        <?php if ($badge_text): ?>
          <div class="about-service__badge">
            <span><?php echo esc_html($badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($left_content): ?>
          <div class="about-service__text-content">
            <?php echo $left_content; ?>
          </div>
        <?php endif; ?>

        <?php if ($button_text && $button_link):
          get_template_part('templates/button', null, array(
            'text' => $button_text,
            'link' => $button_link,
            'type' => 'secondary',
            'class' => 'about-service__button',
            'icon' => 'arrow-down-white',
            'icon_after' => true,
            'aria_label' => esc_attr($button_text)
          ));
        endif; ?>
      </div>

      <div class="about-service__right">

        <?php if ($badges): ?>
          <div class="about-service__badges">
            <?php foreach ($badges as $badge): ?>
              <span class="about-service__badges-item">
                <span class="about-service__badges-dot"></span>
                <span class="about-service__badges-text"><?php echo esc_html($badge['badge_text']); ?></span>
              </span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <div class="about-service__right-content">

          <div class="about-service__photos">

            <div class="about-service__photos-col">
              <?php if ($image_1): ?>
                <img src="<?php echo esc_url($image_1['url']); ?>" alt="<?php echo esc_attr($image_1['alt']); ?>"
                  class="about-service__photo about-service__photo--main" loading="lazy" />
              <?php endif; ?>
            </div>

            <div class="about-service__photos-col">
              <?php if ($image_2): ?>
                <img src="<?php echo esc_url($image_2['url']); ?>" alt="<?php echo esc_attr($image_2['alt']); ?>"
                  class="about-service__photo" loading="lazy" />
              <?php endif; ?>

              <?php if ($image_3): ?>
                <img src="<?php echo esc_url($image_3['url']); ?>" alt="<?php echo esc_attr($image_3['alt']); ?>"
                  class="about-service__photo" loading="lazy" />
              <?php endif; ?>
            </div>
          </div>

          <?php if ($photos_description): ?>
            <div class="about-service__photos-description">
              <?php echo esc_html($photos_description); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>