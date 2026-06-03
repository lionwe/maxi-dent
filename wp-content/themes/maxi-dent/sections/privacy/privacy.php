<?php
/**
 * Privacy Policy Section
 */

$privacy_title = get_field('privacy_title');
$privacy_items = get_field('privacy_items');
$privacy_button_text = get_field('privacy_button_text');
$privacy_button_link = get_field('privacy_button_link');
?>

<section class="privacy-section" id="privacy-policy">
    <div class="container">

        <?php if ($privacy_title): ?>
            <h1 class="privacy-title">
                <?php echo esc_html($privacy_title); ?>
            </h1>
        <?php endif; ?>

        <?php if ($privacy_items): ?>
            <div class="privacy-items">
                <?php foreach ($privacy_items as $item): ?>
                    <?php
                    $item_title = $item['privacy_item_title'] ?? '';
                    $item_text = $item['privacy_item_text'] ?? '';
                    ?>

                    <div class="privacy-item">
                        <?php if ($item_title): ?>
                            <h2 class="privacy-item__title">
                                <?php echo esc_html($item_title); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ($item_text): ?>
                            <div class="privacy-item__text">
                                <?php echo wp_kses_post($item_text); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($privacy_button_text && $privacy_button_link): ?>
            <div class="privacy-button-wrapper">
                <?php
                get_template_part('templates/button', null, [
                    'text' => $privacy_button_text,
                    'link' => $privacy_button_link,
                    'icon' => 'arrow-down-black',
                    'type' => 'primary',
                    'icon_after' => true,
                    'class' => 'privacy-button',
                ]);
                ?>
            </div>
        <?php endif; ?>

    </div>
</section>