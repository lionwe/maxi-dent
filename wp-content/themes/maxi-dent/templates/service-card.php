<?php
/**
 * Service Card Template
 *
 * @param WP_Post $post    Post object.
 * @param string  $modifier CSS modifier class (optional).
 */

$post = $args['post'] ?? null;
$modifier = $args['modifier'] ?? '';

if (!$post) {
    return;
}

$card_class = 'services-post-card';
if ($modifier) {
    $card_class .= ' services-post-card--' . esc_attr($modifier);
}

// Excerpt
$excerpt = get_the_excerpt($post->ID);
if ($excerpt) {
    $excerpt = wp_trim_words($excerpt, 15, '...');
}
?>

<div class="<?php echo esc_attr($card_class); ?>">
    <?php if (has_post_thumbnail($post->ID)): ?>
        <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'medium')); ?>"
            alt="<?php echo esc_attr(get_the_title($post->ID)); ?>" class="services-post-card__image" loading="lazy">
    <?php else: ?>
        <div class="services-post-card__image services-post-card__image--placeholder"></div>
    <?php endif; ?>

    <div class="services-post-card__content">
        <h3 class="services-post-card__title">
            <?php echo esc_html(get_the_title($post->ID)); ?>
        </h3>

        <hr class="services-post-card__divider">

        <?php if ($excerpt): ?>
            <p class="services-post-card__excerpt">
                <?php echo esc_html($excerpt); ?>
            </p>
        <?php endif; ?>
    </div>
</div>