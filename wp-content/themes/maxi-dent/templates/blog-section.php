<?php
$badge_text = $args['badge_text'] ?? '';
$title = $args['title'] ?? '';
$posts_per_page = $args['posts_per_page'] ?? 8;
$exclude_post_id = $args['exclude_post_id'] ?? null;

$bg_image = get_template_directory_uri() . '/assets/images/blog-section-bg.webp';

$query_args = array(
  'post_type' => 'blog',
  'posts_per_page' => $posts_per_page,
  'orderby' => 'date',
  'order' => 'DESC',
  'post_status' => 'publish',
);

if ($exclude_post_id) {
  $query_args['post__not_in'] = array($exclude_post_id);
}

$blog_posts = new WP_Query($query_args);
?>

<section class="blog-section" id="blog">

  <img src="<?php echo esc_url($bg_image); ?>" alt="" class="blog-section__bg" loading="lazy">

  <div class="container container--left-only">

    <div class="blog-header">
      <div class="blog-header__left">
        <?php if ($badge_text): ?>
          <div class="blog-badge">
            <span><?php echo esc_html($badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($title): ?>
          <h2 class="blog-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>
      </div>

      <div class="blog-header__navigation">
        <?php
        get_template_part('templates/button', null, array(
          'type' => 'nav-prev',
          'class' => 'blog-swiper-button-prev',
          'aria_label' => 'Попередня стаття',
          'icon' => 'arrow-prev',
        ));

        get_template_part('templates/button', null, array(
          'type' => 'nav-next',
          'class' => 'blog-swiper-button-next',
          'aria_label' => 'Наступна стаття',
          'icon' => 'arrow-next',
        ));
        ?>
      </div>
    </div>

    <div class="blog-content">
      <div class="swiper blog-swiper" id="blog-carousel">
        <div class="swiper-wrapper">
          <?php
          if ($blog_posts->have_posts()):
            while ($blog_posts->have_posts()):
              $blog_posts->the_post();
              $post_id = get_the_ID();

              $reading_time = get_reading_time($post_id);
              $views = get_post_views($post_id);
              $post_title = get_the_title();
              $post_url = get_the_permalink();

              $card_image_acf = get_field('blog_card_image', $post_id);

              $image_url = '';
              $image_alt = $post_title;

              if ($card_image_acf && is_array($card_image_acf)) {
                $image_url = $card_image_acf['url'];
                $image_alt = !empty($card_image_acf['alt']) ? $card_image_acf['alt'] : $post_title;
              } elseif (has_post_thumbnail($post_id)) {
                $image_url = get_the_post_thumbnail_url($post_id, 'large');
              }
              ?>

              <a href="<?php echo esc_url($post_url); ?>" class="swiper-slide blog-card">
                <div class="blog-card__image">
                  <?php if ($image_url): ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>" loading="lazy">
                  <?php else: ?>
                    <div style="background-color: #eee; width: 100%; height: 100%;"></div>
                  <?php endif; ?>
                </div>

                <div class="blog-card__content">
                  <h3 class="blog-card__title">
                    <?php echo esc_html($post_title); ?>
                  </h3>

                  <div class="blog-card__meta">
                    <span class="blog-card__badge">
                      <?php echo esc_html($reading_time); ?>
                    </span>
                    <span class="blog-card__badge">
                      <?php echo esc_html($views); ?> переглядів
                    </span>
                  </div>
                </div>
              </a>

              <?php
            endwhile;
            wp_reset_postdata();
          else:
            ?>
            <div class="blog-empty">
              <p><?php echo __('Статей поки немає', 'maxi-dent'); ?></p>
            </div>
            <?php
          endif;
          ?>
        </div>
      </div>
    </div>

    <div class="blog-carousel__controls">
      <div class="swiper-pagination blog-carousel__pagination"></div>

      <div class="blog-carousel__navigation blog-carousel__navigation--mobile">
        <?php
        get_template_part('templates/button', null, array(
          'type' => 'nav-prev',
          'class' => 'blog-swiper-button-prev',
          'aria_label' => 'Попередня стаття',
          'icon' => 'arrow-prev',
        ));

        get_template_part('templates/button', null, array(
          'type' => 'nav-next',
          'class' => 'blog-swiper-button-next',
          'aria_label' => 'Наступна стаття',
          'icon' => 'arrow-next',
        ));
        ?>
      </div>
    </div>

  </div>
</section>