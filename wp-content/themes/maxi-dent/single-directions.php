<?php
/**
 * Single Direction Post Template
 */
get_header();
?>

<main class="single-direction">
  <?php
  get_template_part('sections/single-direction/hero');
  get_template_part('sections/single-direction/about');
  get_template_part('sections/single-direction/benefits');
  get_template_part('sections/single-direction/related-services');
  get_template_part('sections/single-direction/results');
  get_template_part('sections/single-direction/reviews');
  get_template_part('sections/home/contact');
  ?>
</main>

<?php get_footer(); ?>
