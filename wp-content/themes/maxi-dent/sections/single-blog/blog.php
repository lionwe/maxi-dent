<?php
/**
 * Single Blog - Related Posts Section
 * Displays blog carousel with other posts
 */

// Blog section ACF fields
$blog_badge_text = get_field('blog_badge_text', 'option');
$blog_title = get_field('blog_title', 'option');

// Fallback values if ACF fields are empty
if (empty($blog_badge_text)) {
  $blog_badge_text = 'Наш блог';
}

if (empty($blog_title)) {
  $blog_title = 'Інші статті';
}

// Get current post ID
$current_post_id = get_the_ID();

// Render blog section template
get_template_part('templates/blog-section', null, array(
  'badge_text' => $blog_badge_text,
  'title' => $blog_title,
  'posts_per_page' => 8,
  'exclude_post_id' => $current_post_id
));
?>
