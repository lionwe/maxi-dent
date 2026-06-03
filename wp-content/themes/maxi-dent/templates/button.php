<?php
/**
 * Button Template
 * * @param array $args - button parameters
 */

// Get arguments
$text = $args['text'] ?? 'Button';
$link = $args['link'] ?? '#';
$icon = $args['icon'] ?? '';
$type = $args['type'] ?? 'primary';
$icon_after = $args['icon_after'] ?? false;
$custom_class = $args['class'] ?? '';
$disabled = $args['disabled'] ?? false;
$btn_id = $args['id'] ?? '';
$aria_label = $args['aria_label'] ?? '';
$icon_plus = $args['icon_plus'] ?? '';
$icon_minus = $args['icon_minus'] ?? '';
$data_attributes = $args['data_attributes'] ?? []; 

// Build class
$class = 'btn-' . $type . ($custom_class ? ' ' . $custom_class : '');

// Build data attributes string
$data_attrs_str = '';
if (!empty($data_attributes)) {
    foreach ($data_attributes as $key => $value) {
        $data_attrs_str .= ' data-' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }
}

// Process icon URI
$icon_uri = '';
if ($icon !== '') {
  if (str_starts_with($icon, 'http://') || str_starts_with($icon, 'https://')) {
    $icon_uri = $icon;
  } else {
    $icon_uri = trailingslashit(get_template_directory_uri()) . 'assets/images/svg/' . ltrim($icon, '/');
    if (!str_ends_with($icon_uri, '.svg')) {
      $icon_uri .= '.svg';
    }
  }
}

// ... (Icon processing for plus/minus remains same) ...
$icon_plus_uri = '';
if ($icon_plus !== '') {
  if (str_starts_with($icon_plus, 'http://') || str_starts_with($icon_plus, 'https://')) {
    $icon_plus_uri = $icon_plus;
  } else {
    $icon_plus_uri = trailingslashit(get_template_directory_uri()) . 'assets/images/svg/' . ltrim($icon_plus, '/');
    if (!str_ends_with($icon_plus_uri, '.svg')) {
      $icon_plus_uri .= '.svg';
    }
  }
}

$icon_minus_uri = '';
if ($icon_minus !== '') {
  if (str_starts_with($icon_minus, 'http://') || str_starts_with($icon_minus, 'https://')) {
    $icon_minus_uri = $icon_minus;
  } else {
    $icon_minus_uri = trailingslashit(get_template_directory_uri()) . 'assets/images/svg/' . ltrim($icon_minus, '/');
    if (!str_ends_with($icon_minus_uri, '.svg')) {
      $icon_minus_uri .= '.svg';
    }
  }
}

// Determine element type
$is_faq_toggle = $type === 'faq-toggle';
$is_nav_button = in_array($type, ['nav-prev', 'nav-next', 'results-view']);
$is_footer_menu = $type === 'footer-menu';
$is_footer_social = $type === 'footer-social';
$is_footer_tertiary = $type === 'footer-tertiary';
$is_burger_button = in_array($type, ['burger-primary', 'burger-secondary']);
?>

<?php if ($is_faq_toggle): ?>
  <button <?php if ($btn_id): ?>id="<?php echo esc_attr($btn_id); ?>" <?php endif; ?> type="button"
    class="<?php echo esc_attr($class); ?>" <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>"
    <?php endif; ?>   <?php if ($disabled): ?>disabled<?php endif; ?> <?php echo $data_attrs_str; ?>>
    <span class="btn-faq-toggle__text"><?php echo esc_html($text); ?></span>
    <span class="btn-faq-toggle__icon-wrapper">
      <?php if (!empty($icon_plus_uri)): ?>
        <img src="<?php echo esc_url($icon_plus_uri); ?>" alt="Open" class="btn-faq-toggle__icon btn-faq-toggle__icon--plus"
          loading="lazy">
      <?php endif; ?>
      <?php if (!empty($icon_minus_uri)): ?>
        <img src="<?php echo esc_url($icon_minus_uri); ?>" alt="Close"
          class="btn-faq-toggle__icon btn-faq-toggle__icon--minus" loading="lazy">
      <?php endif; ?>
    </span>
  </button>

<?php elseif ($is_nav_button): ?>
  <button <?php if ($btn_id): ?>id="<?php echo esc_attr($btn_id); ?>" <?php endif; ?> type="button"
    class="<?php echo esc_attr($class); ?>" <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>"
    <?php endif; ?>   <?php if ($disabled): ?>disabled<?php endif; ?> <?php echo $data_attrs_str; ?>>
    <?php if (!empty($icon_uri)): ?>
      <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
    <?php endif; ?>
  </button>

<?php elseif ($is_footer_menu): ?>
  <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>" <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>" <?php endif; ?> <?php echo $data_attrs_str; ?>>
    <span class="btn-footer-menu__text"><?php echo esc_html($text); ?></span>
  </a>

<?php elseif ($is_footer_social): ?>
  <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>" target="_blank"
    rel="noopener noreferrer" <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>" <?php endif; ?> <?php echo $data_attrs_str; ?>>
    <?php if (!empty($icon_uri)): ?>
      <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
    <?php endif; ?>
  </a>

<?php elseif ($is_footer_tertiary): ?>
  <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>" <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>" <?php endif; ?> <?php echo $data_attrs_str; ?>>
    <span class="btn-footer-tertiary__text"><?php echo esc_html($text); ?></span>
  </a>

<?php elseif ($is_burger_button): ?>
  <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>" <?php if ($btn_id): ?>id="<?php echo esc_attr($btn_id); ?>" <?php endif; ?>   <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>" <?php endif; ?> <?php echo $data_attrs_str; ?>>
    <?php if (!empty($icon_uri) && !$icon_after): ?>
      <span class="btn-<?php echo esc_attr($type); ?>__icon">
        <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
      </span>
    <?php endif; ?>

    <span class="btn-<?php echo esc_attr($type); ?>__text"><?php echo esc_html($text); ?></span>

    <?php if (!empty($icon_uri) && $icon_after): ?>
      <span class="btn-<?php echo esc_attr($type); ?>__icon">
        <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
      </span>
    <?php endif; ?>
  </a>

<?php else: ?>
  <a href="<?php echo esc_url($link); ?>" class="<?php echo esc_attr($class); ?>" <?php if ($btn_id): ?>id="<?php echo esc_attr($btn_id); ?>" <?php endif; ?>   <?php if ($aria_label): ?>aria-label="<?php echo esc_attr($aria_label); ?>" <?php endif; ?> <?php echo $data_attrs_str; ?>>
    <?php if (!empty($icon_uri) && !$icon_after && $type !== 'tertiary'): ?>
      <span class="btn-<?php echo esc_attr($type); ?>__icon">
        <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
      </span>
    <?php endif; ?>

    <span class="btn-<?php echo esc_attr($type); ?>__text"><?php echo esc_html($text); ?></span>

    <?php if (!empty($icon_uri) && $icon_after && $type !== 'tertiary'): ?>
      <span class="btn-<?php echo esc_attr($type); ?>__icon">
        <img src="<?php echo esc_url($icon_uri); ?>" alt="" loading="lazy">
      </span>
    <?php endif; ?>
  </a>
<?php endif; ?>