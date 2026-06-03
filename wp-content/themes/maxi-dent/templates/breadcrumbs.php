<?php
/**
 * Breadcrumbs Template
 * 
 * @param string $current_title - Title of the current page/post
 * @param string $home_url - URL to home page
 * @param string $home_text - Text for home link (default: 'Головна сторінка')
 */

$current_title = $args['current_title'] ?? get_the_title();
$home_url = $args['home_url'] ?? home_url('/');
$home_text = $args['home_text'] ?? 'Головна сторінка';
?>

<div class="breadcrumbs">
  <a href="<?php echo esc_url($home_url); ?>" class="breadcrumbs__link">
    <?php echo esc_html($home_text); ?>
  </a>
  <span class="breadcrumbs__separator">/</span>
  <span class="breadcrumbs__current">
    <?php echo esc_html($current_title); ?>
  </span>
</div>