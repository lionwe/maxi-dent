<?php
/**
 * Blog Section with Swiper Carousel
 */

// Blog section ACF fields
$blog_badge_text = get_field('blog_badge_text');
$blog_title = get_field('blog_title');

// Render template
get_template_part('templates/blog-section', null, array(
  'badge_text' => $blog_badge_text,
  'title' => $blog_title,
  'posts_per_page' => 8
));
