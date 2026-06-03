<?php
/**
 * Footer Template
 */

$social = get_field('social', 'option');
$tiktok = $social['tiktok'] ?? '';
$facebook = $social['facebook'] ?? '';
$instagram = $social['instagram'] ?? '';

$menu_items = wp_get_nav_menu_items('footer-menu');

// Footer bottom fields
$copyright = get_field('copyright', 'option');
$licence = get_field('licence', 'option');
$privacy_policy = get_field('privacy_policy', 'option');
$developer = get_field('developer', 'option');
$developer_link = get_field('developer_link', 'option');
?>

<footer class="footer">
  <div class="container">
    <div class="footer__top">
      <!-- Logo -->
      <a href="<?php echo esc_url(home_url('/')); ?>" class="footer__logo">
        <?php the_custom_logo(); ?>
      </a>

      <!-- Right side: Menu + Social -->
      <div class="footer__right">
        <!-- Menu (2 columns) -->
        <nav class="footer__menu">
          <?php
          if ($menu_items) {
            $total = count($menu_items);
            $items_per_col = ceil($total / 2);

            echo '<div class="footer__menu-column">';
            for ($i = 0; $i < $items_per_col && $i < $total; $i++) {
              $item = $menu_items[$i];
              get_template_part('templates/button', null, array(
                'type' => 'footer-menu',
                'link' => $item->url,
                'text' => $item->title,
                'aria_label' => $item->title
              ));
            }
            echo '</div>';

            if ($total > $items_per_col) {
              echo '<div class="footer__menu-column">';
              for ($i = $items_per_col; $i < $total; $i++) {
                $item = $menu_items[$i];
                get_template_part('templates/button', null, array(
                  'type' => 'footer-menu',
                  'link' => $item->url,
                  'text' => $item->title,
                  'aria_label' => $item->title
                ));
              }
              echo '</div>';
            }
          }
          ?>
        </nav>

        <!-- Social media -->
        <div class="footer__social">
          <?php if ($tiktok): ?>
            <?php get_template_part('templates/button', null, array(
              'type' => 'footer-social',
              'link' => $tiktok,
              'icon' => 'tiktok',
              'aria_label' => 'TikTok'
            )); ?>
          <?php endif; ?>

          <?php if ($facebook): ?>
            <?php get_template_part('templates/button', null, array(
              'type' => 'footer-social',
              'link' => $facebook,
              'icon' => 'facebook',
              'aria_label' => 'Facebook'
            )); ?>
          <?php endif; ?>

          <?php if ($instagram): ?>
            <?php get_template_part('templates/button', null, array(
              'type' => 'footer-social',
              'link' => $instagram,
              'icon' => 'instagram',
              'aria_label' => 'Instagram'
            )); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer__bottom">
      <div class="footer__bottom-content">
        <!-- Left: Copyright & Licence -->
        <div class="footer__bottom-text">
          <?php if ($copyright && $licence): ?>
            <?php echo esc_html($copyright); ?>   <?php echo esc_html($licence); ?>
          <?php elseif ($copyright): ?>
            <?php echo esc_html($copyright); ?>
          <?php elseif ($licence): ?>
            <?php echo esc_html($licence); ?>
          <?php endif; ?>
        </div>

        <!-- Right: Buttons -->
        <div class="footer__bottom-buttons">
          <!-- Privacy Policy Button -->
          <?php if ($privacy_policy): ?>
            <?php
            $privacy_url = is_numeric($privacy_policy) ? get_permalink($privacy_policy) : $privacy_policy;
            $privacy_title = is_numeric($privacy_policy) ? get_the_title($privacy_policy) : 'Privacy Policy';
            ?>
            <?php get_template_part('templates/button', null, array(
              'type' => 'footer-tertiary',
              'link' => $privacy_url,
              'text' => $privacy_title,
              'aria_label' => $privacy_title
            )); ?>
          <?php endif; ?>

          <!-- Developer Button -->
          <?php if ($developer && $developer_link): ?>
            <?php get_template_part('templates/button', null, array(
              'type' => 'footer-tertiary',
              'link' => $developer_link,
              'text' => $developer,
              'aria_label' => $developer
            )); ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="popup popup-thank-you" id="popup-thank-you">
    <div class="popup__backdrop"></div>
    <div class="popup__content">
      <h3 class="popup__title">Дякуємо!</h3>
      <p class="popup__description">
        Вашу заявку успішно відправлено. Ми зв’яжемося з вами найближчим часом
      </p>
      <div class="popup__button-wrapper">
        <button type="button" class="btn-primary close-popup-btn">
          <span class="btn-primary__text">Закрити</span>
        </button>
      </div>
    </div>
  </div>
</footer>

<button type="button" class="scroll-top js-scroll-top" aria-label="Вгору">
  <svg class="scroll-top__icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M12 19V5M5 12L12 5L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  </svg>
</button>

<?php wp_footer(); ?>
</body>

</html>