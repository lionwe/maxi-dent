<?php
/**
 * AJAX Handlers
 */

add_action('wp_ajax_load_pricing_tab', 'load_pricing_tab_ajax');
add_action('wp_ajax_nopriv_load_pricing_tab', 'load_pricing_tab_ajax');

function load_pricing_tab_ajax()
{
    // Verify nonce
    if (
        !isset($_POST['nonce']) ||
        !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['nonce'])), 'pricing_tab_nonce')
    ) {
        wp_send_json_error(array('message' => 'Security check failed'));
    }

    // Get post ID from request (fallback — front page)
    $post_id = isset($_POST['post_id'])
        ? (int) $_POST['post_id']
        : (int) get_option('page_on_front');

    if (!$post_id) {
        wp_send_json_error(array('message' => 'Invalid post ID'));
    }

    // Validate tab index
    if (!isset($_POST['tab_index'])) {
        wp_send_json_error(array('message' => 'Invalid tab index'));
    }

    $tab_index = (int) $_POST['tab_index'];
    $pricing_tabs = get_field('pricing_tabs', $post_id);

    if (!$pricing_tabs || !isset($pricing_tabs[$tab_index])) {
        wp_send_json_error(array('message' => 'Tab not found'));
    }

    $tab = $pricing_tabs[$tab_index];

    // Button fields (same for all tabs)
    $pricing_button_text = get_field('pricing_button_text', $post_id);
    $pricing_button_link = get_field('pricing_button_link', $post_id);

    ob_start();

    // Services list
    get_template_part(
        'templates/pricing-services-list',
        null,
        array(
            'services' => $tab['tab_services'] ?? array(),
        )
    );

    // Load More Button (Hidden by default)
    ?>
    <div class="pricing-load-more-wrapper" style="display: none;">
        <?php
        get_template_part(
            'templates/button',
            null,
            array(
                'text' => 'Більше',
                'link' => '#',
                'icon' => 'arrow-down-black',
                'type' => 'secondary',
                'icon_after' => true,
                'class' => 'pricing-button pricing-load-more-btn',
            )
        );
        ?>
    </div>

    <div class="pricing-mobile-button">
        <?php
        get_template_part(
            'templates/button',
            null,
            array(
                'text' => $pricing_button_text ?: 'Contact',
                'link' => $pricing_button_link,
                'icon' => 'arrow-down-black',
                'type' => 'primary',
                'icon_after' => true,
                'class' => 'pricing-button pricing-button--mobile',
            )
        );
        ?>
    </div>
    <?php

    $html = ob_get_clean();

    wp_send_json_success(array('html' => $html));
}