<?php
/**
 * Hero Schedule Template
 */
$work_schedule = get_field('work_schedule', 'option');
?>

<div class="hero-card hero-card--schedule">
  <h3 class="hero-card__title">Графік роботи:</h3>
  <?php if ($work_schedule): ?>
    <div class="hero-card__content">
      <ul class="hero-card__list">
        <?php foreach ($work_schedule as $schedule): ?>
          <li class="hero-card__item">
            <?php echo esc_html($schedule['days'] . ' ' . $schedule['hours']); ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>
</div>
