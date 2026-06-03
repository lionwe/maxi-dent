<?php
/**
 * FAQ Item Template
 *
 * @param array $args {
 *   @type array $item  FAQ item data
 *   @type int   $index Item index
 * }
 */

$item  = $args['item']  ?? array();
$index = $args['index'] ?? 0;

$faq_question = $item['faq_question'] ?? '';
$faq_answer   = $item['faq_answer']   ?? '';
?>

<div class="faq-accordion__item" data-faq-item="<?php echo esc_attr($index); ?>">
  <?php
  get_template_part(
    'templates/button',
    null,
    array(
      'text'       => $faq_question,
      'type'       => 'faq-toggle',
      'icon_plus'  => 'faq-plus',
      'icon_minus' => 'faq-minus',
      'class'      => 'faq-accordion__trigger',
      'id'         => 'faq-trigger-' . $index,
      'aria_label' => 'Toggle FAQ item',
    )
  );
  ?>
  <div class="faq-accordion__content">
    <div class="faq-accordion__answer">
      <?php echo wp_kses_post($faq_answer); ?>
    </div>
  </div>
</div>
