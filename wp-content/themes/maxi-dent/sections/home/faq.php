<?php
$faq_badge_text = get_field('faq_badge_text');
$faq_title = get_field('faq_title');
$faq_consultation_title = get_field('faq_consultation_title');
$faq_consultation_description = get_field('faq_consultation_description');
$faq_button_text = get_field('faq_button_text');
$faq_button_link = get_field('faq_button_link');
$faq_items = get_field('faq_items');

$total_items = count($faq_items ?? array());
$items_per_column = $total_items > 0 ? ceil($total_items / 2) : 0;

$has_consultation =
  $faq_consultation_title
  || $faq_consultation_description
  || ($faq_button_text && $faq_button_link);

$bg_desktop = get_template_directory_uri() . '/assets/images/faq-section-bg.webp';
$bg_mobile = get_template_directory_uri() . '/assets/images/faq-section-bg-mobile.webp';
?>

<section class="faq-section" id="faq">

  <picture class="faq-section__bg">
    <source media="(max-width: 1200px)" srcset="<?php echo esc_url($bg_mobile); ?>">
    <img src="<?php echo esc_url($bg_desktop); ?>" alt="" loading="lazy">
  </picture>

  <div class="container">

    <div class="faq-left">
      <div class="faq-left__header">
        <?php if ($faq_badge_text): ?>
          <div class="faq-badge">
            <span><?php echo esc_html($faq_badge_text); ?></span>
          </div>
        <?php endif; ?>

        <?php if ($faq_title): ?>
          <h2 class="faq-title"><?php echo esc_html($faq_title); ?></h2>
        <?php endif; ?>
      </div>

      <?php if ($has_consultation): ?>
        <div class="faq-consultation-card faq-consultation-card--desktop">
          <?php if ($faq_consultation_title): ?>
            <h3 class="faq-consultation-card__title">
              <?php echo esc_html($faq_consultation_title); ?>
            </h3>
          <?php endif; ?>

          <?php if ($faq_consultation_description): ?>
            <p class="faq-consultation-card__description">
              <?php echo nl2br(esc_html($faq_consultation_description)); ?>
            </p>
          <?php endif; ?>

          <?php if ($faq_button_text && $faq_button_link): ?>
            <div class="faq-consultation-card__button">
              <?php
              get_template_part(
                'templates/button',
                null,
                array(
                  'text' => $faq_button_text,
                  'link' => $faq_button_link,
                  'icon' => 'arrow-down-white',
                  'type' => 'secondary',
                  'icon_after' => true,
                )
              );
              ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </div>

    <div class="faq-right">
      <?php if (!empty($faq_items)): ?>
        <div class="faq-grid">
          <div class="faq-column">
            <?php
            $column1_items = array_slice($faq_items, 0, $items_per_column);
            foreach ($column1_items as $index => $item) {
              get_template_part(
                'templates/faq-item',
                null,
                array(
                  'item' => $item,
                  'index' => $index,
                )
              );
            }
            ?>
          </div>

          <div class="faq-column">
            <?php
            $column2_items = array_slice($faq_items, $items_per_column);
            foreach ($column2_items as $index => $item) {
              $real_index = $index + $items_per_column;

              get_template_part(
                'templates/faq-item',
                null,
                array(
                  'item' => $item,
                  'index' => $real_index,
                )
              );
            }
            ?>
          </div>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>

<?php if ($has_consultation): ?>
  <section class="faq-consultation-strip">
    <div class="container">
      <div class="faq-consultation-card faq-consultation-card--mobile">
        <?php if ($faq_consultation_title): ?>
          <h3 class="faq-consultation-card__title">
            <?php echo esc_html($faq_consultation_title); ?>
          </h3>
        <?php endif; ?>

        <div class="faq-consultation-card__divider"></div>

        <?php if ($faq_consultation_description): ?>
          <p class="faq-consultation-card__description">
            <?php echo nl2br(esc_html($faq_consultation_description)); ?>
          </p>
        <?php endif; ?>

        <?php if ($faq_button_text && $faq_button_link): ?>
          <div class="faq-consultation-card__button">
            <?php
            get_template_part(
              'templates/button',
              null,
              array(
                'text' => $faq_button_text,
                'link' => $faq_button_link,
                'icon' => 'arrow-down-white',
                'type' => 'secondary',
                'icon_after' => true,
              )
            );
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>
<?php endif; ?>