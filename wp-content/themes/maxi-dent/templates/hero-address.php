<?php
/**
 * Hero Address Template
 */
$address = get_field('address', 'option');
?>

<div class="hero-card hero-card--address">
  <h3 class="hero-card__title">Наша адреса:</h3>
  <?php if ($address): ?>
    <div class="hero-card__content">
      <ul class="hero-card__list">
        <li class="hero-card__item">
          <?php echo nl2br(esc_html($address)); ?>
        </li>
      </ul>
    </div>
    <div class="hero-map">
      <iframe
        src="https://maps.google.com/maps?q=<?php echo urlencode($address); ?>&output=embed"
        width="100%" height="120" style="border:0;"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe>
    </div>
  <?php endif; ?>
</div>
