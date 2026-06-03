<?php
/**
 * Results Card Template
 *
 * @param array $args {
 *   @type array $item The result item data.
 * }
 */
$item = $args['item'] ?? [];
?>
<div class="results-card">
    <div class="results-card__front">
        <div class="results-card__content">
            <div class="results-card__header">
                <?php get_template_part('templates/button', null, [
                    'type'       => 'results-view',
                    'icon'       => 'result-arrow',
                    'aria_label' => 'Переглянути результат',
                ]); ?>
                <?php if (!empty($item['result_title'])): ?>
                    <p class="results-card__title"><?php echo esc_html($item['result_title']); ?></p>
                <?php endif; ?>
            </div>
            <p class="results-card__hint">*тисни, щоб побачити до/після</p>
        </div>
    </div>
    <div class="results-card__back">
        <?php if (!empty($item['result_image'])): ?>
            <img src="<?php echo esc_url($item['result_image']); ?>" alt="" class="results-card__image" loading="lazy">
        <?php endif; ?>
    </div>
</div>
