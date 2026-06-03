<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<main id="home">
  <?php
    get_template_part('sections/home/hero');
    get_template_part('sections/home/about');
    get_template_part('sections/home/benefits');
    get_template_part('sections/home/directions');
    get_template_part('sections/home/contact-simple');
    get_template_part('sections/home/team');
    get_template_part('sections/home/results');
    get_template_part('sections/home/pricing');
    get_template_part('sections/home/faq');
    get_template_part('sections/home/reviews');
    get_template_part('sections/home/blog');
    get_template_part('sections/home/contact');


  ?>
</main>

<?php get_footer(); ?>
