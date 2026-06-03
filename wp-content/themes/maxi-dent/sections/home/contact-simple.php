<?php
/**
 * Contact Section (simple, without bottom blocks)
 */

$contact_title = get_field('contact_title');
$contact_description = get_field('contact_description');
$contact_manager_image = get_field('contact_manager_image');
$contact_manager_text = get_field('contact_manager_text');
$contact_counter_number = get_field('contact_counter_number');
$contact_counter_text = get_field('contact_counter_text');
$contact_items = get_field('contact_items');
$contact_form_shortcode = get_field('contact_form_shortcode');
?>

<section class="contact-section" id="contact-simple">
  <div class="container">

    <!-- Header badges -->
    <div class="contact-header">
      <?php if (!empty($contact_items) && is_array($contact_items)): ?>
        <ul class="contact-list">
          <?php foreach ($contact_items as $item): ?>
            <?php if (!empty($item['contact_text'])): ?>
              <li class="contact-item">
                <span><?php echo esc_html($item['contact_text']); ?></span>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>

    <!-- Top content -->
    <div class="contact-content">
      <div class="contact-box-left">
        <div class="contact-box-left__text">
          <?php if ($contact_title): ?>
            <h2 class="contact-box-left__title">
              <?php echo esc_html($contact_title); ?>
            </h2>
          <?php endif; ?>

          <?php if ($contact_description): ?>
            <p class="contact-box-left__description">
              <?php echo esc_html($contact_description); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php if ($contact_manager_image || $contact_manager_text): ?>
          <div class="contact-box-left__manager">
            <?php if ($contact_manager_image): ?>
              <div class="contact-box-left__manager-image">
                <img src="<?php echo esc_url($contact_manager_image); ?>" alt="Contact manager" loading="lazy">
              </div>
            <?php endif; ?>

            <div class="contact-box-left__manager-content">
              <?php if ($contact_manager_text): ?>
                <p class="contact-box-left__manager-text">
                  <?php echo esc_html($contact_manager_text); ?>
                </p>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($contact_counter_number || $contact_counter_text): ?>
          <!-- Desktop counter (absolute) -->
          <div class="contact-box-left__counter contact-box-left__counter--desktop">
            <?php if ($contact_counter_number): ?>
              <div class="contact-box-left__counter-circle">
                <?php echo esc_html($contact_counter_number); ?>
              </div>
            <?php endif; ?>

            <?php if ($contact_counter_text): ?>
              <p class="contact-box-left__counter-text">
                <?php echo esc_html($contact_counter_text); ?>
              </p>
            <?php endif; ?>
          </div>

          <!-- Mobile counter (static, centered) -->
          <div class="contact-box-left__counter contact-box-left__counter--mobile">
            <?php if ($contact_counter_number): ?>
              <div class="contact-box-left__counter-circle">
                <?php echo esc_html($contact_counter_number); ?>
              </div>
            <?php endif; ?>

            <?php if ($contact_counter_text): ?>
              <p class="contact-box-left__counter-text">
                <?php echo esc_html($contact_counter_text); ?>
              </p>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="contact-box-right">
        <?php if ($contact_form_shortcode): ?>
          <?php echo do_shortcode($contact_form_shortcode); ?>
        <?php endif; ?>
      </div>
    </div>

  </div>
</section>