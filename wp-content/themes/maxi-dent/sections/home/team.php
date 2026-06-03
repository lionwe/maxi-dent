<?php
/**
 * Team Section
 */

$team_badge_text = get_field('team_badge_text');
$team_title = get_field('team_title');
$team_description = get_field('team_description');
$team_posts = new WP_Query(array(
  'post_type' => 'team',
  'posts_per_page' => -1,
  'orderby' => 'date',
  'order' => 'ASC',
  'post_status' => 'publish',
));

$bg_team_desktop = get_template_directory_uri() . '/assets/images/team-section-bg.webp';
$bg_team_mobile = get_template_directory_uri() . '/assets/images/team-section-bg-mobile.webp';
?>

<section class="team-section" id="team">

  <picture class="team-section__bg">
    <source media="(max-width: 768px)" srcset="<?php echo esc_url($bg_team_mobile); ?>">
    <img src="<?php echo esc_url($bg_team_desktop); ?>" alt="" loading="lazy">
  </picture>

  <div class="container container--left-only">

    <div class="team-left">
      <?php if ($team_badge_text): ?>
        <div class="team-badge">
          <span><?php echo esc_html($team_badge_text); ?></span>
        </div>
      <?php endif; ?>

      <?php if ($team_title): ?>
        <h2 class="team-title"><?php echo esc_html($team_title); ?></h2>
      <?php endif; ?>

      <?php if ($team_description): ?>
        <p class="team-description"><?php echo wp_kses_post($team_description); ?></p>
      <?php endif; ?>
    </div>

    <div class="team-right">
      <div class="swiper team-swiper" id="team-carousel">
        <div class="swiper-wrapper">
          <?php
          if ($team_posts->have_posts()):
            $counter = 1;
            while ($team_posts->have_posts()):
              $team_posts->the_post();
              get_template_part('templates/team-card', null, array(
                'post_id' => get_the_ID(),
                'counter' => $counter,
              ));
              $counter++;
            endwhile;
            wp_reset_postdata();
          else:
            ?>
            <p>Лікарів не знайдено</p>
            <?php
          endif;
          ?>
        </div>
      </div>

      <div class="team-carousel__controls">
        <div class="swiper-pagination team-carousel__pagination"></div>

        <div class="team-carousel__navigation">
          <?php
          get_template_part('templates/button', null, array(
            'type' => 'nav-prev',
            'class' => 'team-swiper-button-prev',
            'aria_label' => 'Previous',
            'icon' => 'arrow-prev',
          ));

          get_template_part('templates/button', null, array(
            'type' => 'nav-next',
            'class' => 'team-swiper-button-next',
            'aria_label' => 'Next',
            'icon' => 'arrow-next',
          ));
          ?>
        </div>
      </div>
    </div>

  </div>
</section>