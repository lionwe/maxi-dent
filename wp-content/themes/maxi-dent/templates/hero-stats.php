<?php
/**
 * Hero Stats Template
 */
$stats_title = get_field('service_stats_title');
$stats_number = get_field('service_stats_number');
$stats_description = get_field('service_stats_description');
?>

<?php if ($stats_number): ?>
  <div class="hero-stats">
    <div class="hero-stats__content">
      <?php if ($stats_title): ?>
        <p class="hero-stats__title"><?php echo esc_html($stats_title); ?></p>
      <?php endif; ?>

      <div class="hero-stats__data">
        <span class="hero-stats__number"><?php echo esc_html($stats_number); ?></span>
        <?php if ($stats_description): ?>
          <span class="hero-stats__description"><?php echo esc_html($stats_description); ?></span>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php endif; ?>