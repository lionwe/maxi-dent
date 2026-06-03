<?php
/**
 * Contact Section (global options)
 */

// Contact section (top + form)
$contact_title = get_field('contact_title', 'option');
$contact_description = get_field('contact_description', 'option');
$contact_manager_image = get_field('contact_manager_image', 'option');
$contact_manager_text = get_field('contact_manager_text', 'option');
$contact_counter_number = get_field('contact_counter_number', 'option');
$contact_counter_text = get_field('contact_counter_text', 'option');
$contact_items = get_field('contact_items', 'option');
$contact_form_shortcode = get_field('contact_form_shortcode', 'option');
$contact_button_icon = get_field('contact_button_icon', 'option');

// Contact info (bottom)
$contact_info_title = get_field('contact_info_title', 'option');
$contact_info_badges = get_field('contact_info_badges', 'option');
$contact_info_background = get_field('contact_info_background', 'option');
$phone = get_field('phone', 'option');
$work_schedule = get_field('work_schedule', 'option');
$address = get_field('address', 'option');
?>

<section class="contact-section" id="contact">
  <div class="container">

    <!-- Top badges -->
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

    <!-- Bottom content -->
    <div class="contact-content-bottom">

      <!-- Left info column -->
      <div class="contact-info-left">
        <div class="contact-info-left__background" <?php if ($contact_info_background): ?>
            style="background-image: url('<?php echo esc_url($contact_info_background); ?>');" <?php endif; ?>>

          <div class="contact-info-left__inner-left">
            <div class="contact-info-badges">
              <?php if (!empty($contact_info_badges) && is_array($contact_info_badges)): ?>
                <?php foreach ($contact_info_badges as $badge): ?>
                  <?php if (!empty($badge['badge_text'])): ?>
                    <div class="contact-info-badge">
                      <span class="contact-info-badge__dot"></span>
                      <span class="contact-info-badge__text">
                        <?php echo esc_html($badge['badge_text']); ?>
                      </span>
                    </div>
                  <?php endif; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>

            <div class="contact-info-phone">
              <?php if ($contact_info_title): ?>
                <h3 class="contact-info-phone__title">
                  <?php echo esc_html($contact_info_title); ?>
                </h3>
              <?php endif; ?>

              <?php if ($phone): ?>
                <div class="contact-info-phone__content">
                  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/svg/phone-icon.svg'); ?>"
                    alt="Phone icon" class="contact-info-phone__icon" loading="lazy">
                  <p class="contact-info-phone__number">
                    <?php echo esc_html($phone); ?>
                  </p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <div class="contact-info-left__inner-right">
            <div class="contact-info-schedule">
              <h3 class="contact-info-schedule__title">Графік роботи:</h3>

              <?php if (!empty($work_schedule) && is_array($work_schedule)): ?>
                <div class="contact-info-schedule__list">
                  <?php foreach ($work_schedule as $item): ?>
                    <?php
                    $days = $item['days'] ?? '';
                    $hours = $item['hours'] ?? '';
                    if (!$days && !$hours) {
                      continue;
                    }
                    ?>
                    <div class="contact-info-schedule__item">
                      <span class="contact-info-schedule__dot"></span>
                      <span class="contact-info-schedule__text">
                        <?php echo esc_html(trim($days . ' ' . $hours)); ?>
                      </span>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>

        </div>
      </div>

      <!-- Right map column -->
      <div class="contact-info-right">
        <div class="contact-info-map">
          <?php if ($address): ?>
            <iframe
              src="<?php echo esc_url('https://maps.google.com/maps?q=' . urlencode($address) . '&output=embed'); ?>"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Location map"></iframe>
          <?php endif; ?>

          <?php if ($address): ?>
            <div class="contact-info-map__address">
              <h3 class="contact-info-map__title">Наша адреса:</h3>
              <div class="contact-info-map__content">
                <span class="contact-info-map__dot"></span>
                <p class="contact-info-map__text">
                  <?php echo nl2br(esc_html($address)); ?>
                </p>
              </div>
            </div>
          <?php endif; ?>
        </div>
      </div>

    </div>
  </div>
</section>