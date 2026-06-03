<?php
/**
 * Single Blog - Share Section
 */
?>

<section class="single-blog-share">
    <div class="container">
        <div class="single-blog-share__header">
            <span class="single-blog-share__line"></span>
            <h3 class="single-blog-share__title">Поширити</h3>
            <span class="single-blog-share__line"></span>
        </div>

        <div class="single-blog-share__buttons">

            <div class="single-blog-share__btn-wrapper">
                <button class="single-blog-share__btn js-copy-link" aria-label="Скопіювати посилання"
                    data-url="<?php echo esc_url(get_permalink()); ?>">
                    <img src="<?php echo get_theme_file_uri('/assets/images/svg/link-alt.svg'); ?>" alt="Copy Link"
                        width="24" height="24">
                </button>
                <div class="single-blog-share__tooltip" id="copy-tooltip">Скопійовано!</div>
            </div>

            <a href="https://www.instagram.com/" class="single-blog-share__btn" target="_blank" rel="noopener"
                aria-label="Instagram">
                <img src="<?php echo get_theme_file_uri('/assets/images/svg/instagram.svg'); ?>" alt="Instagram"
                    width="24" height="24">
            </a>

            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                class="single-blog-share__btn" target="_blank" rel="noopener" aria-label="Поширити у Facebook">
                <img src="<?php echo get_theme_file_uri('/assets/images/svg/facebook.svg'); ?>" alt="Facebook"
                    width="24" height="24">
            </a>

            <a href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                class="single-blog-share__btn" target="_blank" rel="noopener" aria-label="Поширити у Telegram">
                <img src="<?php echo get_theme_file_uri('/assets/images/svg/telegram.svg'); ?>" alt="Telegram"
                    width="24" height="24">
            </a>

            <a href="https://x.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                class="single-blog-share__btn" target="_blank" rel="noopener" aria-label="Поширити у X">
                <img src="<?php echo get_theme_file_uri('/assets/images/svg/x.svg'); ?>" alt="X" width="24" height="24">
            </a>

        </div>
    </div>
</section>