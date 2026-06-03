<?php
$location = isset($args['location']) ? $args['location'] : 'menu-header';

wp_nav_menu(array(
    'theme_location' => $location,
    'container' => false,
    'menu_class' => 'nav-list',
    'fallback_cb' => 'wp_page_menu'
));
?>
