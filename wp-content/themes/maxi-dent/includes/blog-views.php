<?php
/**
 * Blog Post Views Counter
 * Handles view tracking and retrieval for blog posts
 */

// Meta key for views count
define('BLOG_VIEWS_META_KEY', '_post_views');

/**
 * Increment blog post views
 */
function maxi_dent_increment_blog_views() {
    if (!is_singular('blog')) {
        return;
    }

    // Don't count views for logged-in admins
    if (current_user_can('manage_options')) {
        return;
    }

    $post_id = get_the_ID();
    if (!$post_id) {
        return;
    }

    $views = get_post_meta($post_id, BLOG_VIEWS_META_KEY, true);
    $views = !empty($views) ? intval($views) + 1 : 1;
    update_post_meta($post_id, BLOG_VIEWS_META_KEY, $views);
}

add_action('wp_head', 'maxi_dent_increment_blog_views');

/**
 * Get post views count
 * @param int $post_id
 * @return int
 */
function get_post_views($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $views = get_post_meta($post_id, BLOG_VIEWS_META_KEY, true);
    return !empty($views) ? intval($views) : 0;
}

/**
 * Calculate reading time based on word count
 * @param int $post_id
 * @return string
 */
function get_reading_time($post_id = null) {
    if (!$post_id) {
        $post_id = get_the_ID();
    }

    $content = get_post_field('post_content', $post_id);
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 120); // 120 words per minute
    
    return $reading_time . ' хв';
}
