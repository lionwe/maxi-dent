<?php
/**
 * Pricing Services List Template
 * 
 * @param array $args {
 *     @type array $services List of services
 * }
 */

$services = $args['services'] ?? [];
?>

<div class="pricing-services-list">
  <?php if (!empty($services)): ?>
    <?php foreach ($services as $service): ?>
      <div class="pricing-service-row">
        <div class="pricing-service-name">
          <span><?php echo esc_html($service['service_name']); ?></span>
        </div>
        <div class="pricing-service-price-container">
          <div class="pricing-service-price">
            <span><?php echo esc_html($service['service_price']); ?></span>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p>Послуги не знайдено</p>
  <?php endif; ?>
</div>
