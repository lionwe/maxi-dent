<?php
/**
 * Single Blog Post Template
 */
get_header();
?>

<main class="single-blog">
  <?php
  get_template_part('sections/single-blog/hero');
  get_template_part('sections/single-blog/content');
  get_template_part('sections/single-blog/share');
  get_template_part('sections/single-blog/blog');
  ?>
</main>

<?php get_footer(); ?>
