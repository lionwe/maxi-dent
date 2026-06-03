<?php
/**
 * Single Blog - Hero Section
 */

$blog_short_description = get_field('blog_short_description');
$blog_hero_title_main = get_field('blog_hero_title_main');
$blog_hero_title_secondary = get_field('blog_hero_title_secondary');

$social = get_field('social', 'option');
$tiktok = $social['tiktok'] ?? '';
$facebook = $social['facebook'] ?? '';
$instagram = $social['instagram'] ?? '';

$post_date = get_the_date('d.m.Y');
$post_views = get_post_views();
$featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');

/**
 * Fallbacks: use the default title if the ACF fields are empty.
 */
$hero_title_main = $blog_hero_title_main ?: get_the_title();
$hero_title_secondary = $blog_hero_title_secondary ?: '';
?>

<section class="single-blog-hero" <?php if ($featured_image): ?>
    style="background-image: url('<?php echo esc_url($featured_image); ?>');" <?php endif; ?>>
  <div class="container">

    <!-- Breadcrumbs -->
    <?php
    get_template_part('templates/breadcrumbs', null, array(
      'current_title' => get_the_title(),
      'home_url' => home_url('/'),
      'home_text' => 'Головна сторінка',
    ));
    ?>

    <!-- Desktop layout -->
    <div class="single-blog-hero__content single-blog-hero__content--desktop">
      <!-- Left block -->
      <div class="single-blog-hero__left">
        <h1 class="single-blog-hero__title">
          <?php echo esc_html($hero_title_main); ?>

          <?php if ($blog_short_description): ?>
            <span class="single-blog-hero__title-description">
              <?php echo esc_html($blog_short_description); ?>
            </span>
          <?php endif; ?>

          <?php if ($hero_title_secondary): ?>
            <?php echo esc_html($hero_title_secondary); ?>
          <?php endif; ?>
        </h1>

        <div class="single-blog-hero__meta">
          <div class="single-blog-hero__meta-item">
            <span class="single-blog-hero__meta-label">Дата публікації</span>
            <div class="single-blog-hero__meta-value">
              <?php echo esc_html($post_date); ?>
            </div>
          </div>

          <div class="single-blog-hero__meta-divider"></div>

          <div class="single-blog-hero__meta-item">
            <span class="single-blog-hero__meta-label">Кількість переглядів</span>
            <div class="single-blog-hero__meta-value">
              <?php echo esc_html($post_views); ?>
            </div>
          </div>
        </div>
      </div>

      <!-- Right block (social) -->
      <div class="single-blog-hero__right">
        <?php if ($tiktok): ?>
          <a href="<?php echo esc_url($tiktok); ?>" class="single-blog-hero__social-btn" target="_blank" rel="noopener">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/tiktok.svg" alt="TikTok"
              loading="lazy">
          </a>
        <?php endif; ?>

        <?php if ($facebook): ?>
          <a href="<?php echo esc_url($facebook); ?>" class="single-blog-hero__social-btn" target="_blank" rel="noopener">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/facebook.svg" alt="Facebook"
              loading="lazy">
          </a>
        <?php endif; ?>

        <?php if ($instagram): ?>
          <a href="<?php echo esc_url($instagram); ?>" class="single-blog-hero__social-btn" target="_blank"
            rel="noopener">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/instagram.svg" alt="Instagram"
              loading="lazy">
          </a>
        <?php endif; ?>
      </div>
    </div>

    <!-- Mobile layout -->
    <div class="single-blog-hero__content single-blog-hero__content--mobile">
      <div class="single-blog-hero__mobile-top">
        <h1 class="single-blog-hero__mobile-title">
          <?php
          echo esc_html(trim($hero_title_main . ' ' . $hero_title_secondary));
          ?>
        </h1>

        <?php if ($blog_short_description): ?>
          <p class="single-blog-hero__mobile-description">
            <?php echo esc_html($blog_short_description); ?>
          </p>
        <?php endif; ?>
      </div>

      <div class="single-blog-hero__mobile-bottom">
        <div class="single-blog-hero__mobile-meta">
          <div class="single-blog-hero__mobile-meta-item">
            <span class="single-blog-hero__mobile-meta-label">Дата публікації</span>
            <div class="single-blog-hero__mobile-meta-value">
              <?php echo esc_html($post_date); ?>
            </div>
          </div>

          <div class="single-blog-hero__mobile-meta-item">
            <span class="single-blog-hero__mobile-meta-label">Кількість переглядів</span>
            <div class="single-blog-hero__mobile-meta-value">
              <?php echo esc_html($post_views); ?>
            </div>
          </div>
        </div>

        <div class="single-blog-hero__mobile-social">
          <?php if ($tiktok): ?>
            <a href="<?php echo esc_url($tiktok); ?>" class="single-blog-hero__mobile-social-btn" target="_blank"
              rel="noopener" aria-label="TikTok">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/tiktok.svg" alt="TikTok"
                loading="lazy">
            </a>
          <?php endif; ?>

          <?php if ($facebook): ?>
            <a href="<?php echo esc_url($facebook); ?>" class="single-blog-hero__mobile-social-btn" target="_blank"
              rel="noopener" aria-label="Facebook">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/facebook.svg" alt="Facebook"
                loading="lazy">
            </a>
          <?php endif; ?>

          <?php if ($instagram): ?>
            <a href="<?php echo esc_url($instagram); ?>" class="single-blog-hero__mobile-social-btn" target="_blank"
              rel="noopener" aria-label="Instagram">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/svg/instagram.svg" alt="Instagram"
                loading="lazy">
            </a>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</section>