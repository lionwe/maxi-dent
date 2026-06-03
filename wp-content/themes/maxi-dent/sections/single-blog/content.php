<?php
/**
 * Single Blog - Content Section
 */

$blog_badge_text = get_field('blog_badge_text');
$blog_content_title = get_field('blog_content_title');
?>

<section class="single-blog-content">
  <div class="container">
    <!-- Header (Badge + Title) -->
    <div class="single-blog-content__header">
      <?php if ($blog_badge_text): ?>
        <div class="single-blog-content__badge">
          <span><?php echo esc_html($blog_badge_text); ?></span>
        </div>
      <?php endif; ?>

      <?php if ($blog_content_title): ?>
        <h2 class="single-blog-content__title">
          <?php echo esc_html($blog_content_title); ?>
        </h2>
      <?php endif; ?>
    </div>

    <!-- Post Content (Two columns) -->
    <div class="single-blog-content__text">
      <?php
      if (have_posts()):
        while (have_posts()):
          the_post();
          the_content();
        endwhile;
      endif;
      ?>
    </div>
  </div>
</section>
