<?php
/**
 * Custom Post Types Registration
 */

// Directions post type
add_action('init', function () {

    $directions_labels = array(
        'name' => _x('Напрямки', 'Post Type General Name', 'maxi-dent'),
        'singular_name' => _x('Напрямок', 'Post Type Singular Name', 'maxi-dent'),
        'menu_name' => __('Напрямки', 'maxi-dent'),
        'name_admin_bar' => __('Напрямок', 'maxi-dent'),
        'archives' => __('Архіви напрямків', 'maxi-dent'),
        'attributes' => __('Атрибути напрямків', 'maxi-dent'),
        'parent_item_colon' => __('Батьківський напрямок:', 'maxi-dent'),
        'all_items' => __('Всі напрямки', 'maxi-dent'),
        'add_new_item' => __('Додати новий напрямок', 'maxi-dent'),
        'add_new' => __('Додати', 'maxi-dent'),
        'new_item' => __('Новий напрямок', 'maxi-dent'),
        'edit_item' => __('Редагувати напрямок', 'maxi-dent'),
        'update_item' => __('Оновити напрямок', 'maxi-dent'),
        'view_item' => __('Переглянути напрямок', 'maxi-dent'),
        'view_items' => __('Переглянути напрямки', 'maxi-dent'),
        'search_items' => __('Пошук напрямків', 'maxi-dent'),
        'not_found' => __('Напрямки не знайдені', 'maxi-dent'),
        'not_found_in_trash' => __('Напрямки не знайдені у кошику', 'maxi-dent'),
        'featured_image' => __('Зображення напрямку', 'maxi-dent'),
        'set_featured_image' => __('Встановити зображення напрямку', 'maxi-dent'),
        'remove_featured_image' => __('Видалити зображення напрямку', 'maxi-dent'),
        'use_featured_image' => __('Використовувати як зображення напрямку', 'maxi-dent'),
        'insert_into_item' => __('Вставити до напрямку', 'maxi-dent'),
        'uploaded_to_this_item' => __('Завантажено до цього напрямку', 'maxi-dent'),
        'items_list' => __('Список напрямків', 'maxi-dent'),
        'items_list_navigation' => __('Навігація списку напрямків', 'maxi-dent'),
        'filter_items_list' => __('Фільтрувати список напрямків', 'maxi-dent'),
    );

    $directions_args = array(
        'label' => __('Напрямки', 'maxi-dent'),
        'description' => __('Стоматологічні напрямки', 'maxi-dent'),
        'labels' => $directions_labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-info',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => 'directions',
            'with_front' => true,
        ),
        'capability_type' => 'post',
        'show_in_rest' => true,
    );

    register_post_type('directions', $directions_args);
});

// Services post type (with heart icon)
add_action('init', function () {

    $services_labels = array(
        'name' => _x('Послуги', 'Post Type General Name', 'maxi-dent'),
        'singular_name' => _x('Послуга', 'Post Type Singular Name', 'maxi-dent'),
        'menu_name' => __('Послуги', 'maxi-dent'),
        'name_admin_bar' => __('Послуга', 'maxi-dent'),
        'archives' => __('Архіви послуг', 'maxi-dent'),
        'attributes' => __('Атрибути послуг', 'maxi-dent'),
        'parent_item_colon' => __('Батьківська послуга:', 'maxi-dent'),
        'all_items' => __('Всі послуги', 'maxi-dent'),
        'add_new_item' => __('Додати нову послугу', 'maxi-dent'),
        'add_new' => __('Додати', 'maxi-dent'),
        'new_item' => __('Нова послуга', 'maxi-dent'),
        'edit_item' => __('Редагувати послугу', 'maxi-dent'),
        'update_item' => __('Оновити послугу', 'maxi-dent'),
        'view_item' => __('Переглянути послугу', 'maxi-dent'),
        'view_items' => __('Переглянути послуги', 'maxi-dent'),
        'search_items' => __('Пошук послуг', 'maxi-dent'),
        'not_found' => __('Послуги не знайдені', 'maxi-dent'),
        'not_found_in_trash' => __('Послуги не знайдені у кошику', 'maxi-dent'),
        'featured_image' => __('Зображення послуги', 'maxi-dent'),
        'set_featured_image' => __('Встановити зображення послуги', 'maxi-dent'),
        'remove_featured_image' => __('Видалити зображення послуги', 'maxi-dent'),
        'use_featured_image' => __('Використовувати як зображення послуги', 'maxi-dent'),
        'insert_into_item' => __('Вставити до послуги', 'maxi-dent'),
        'uploaded_to_this_item' => __('Завантажено до цієї послуги', 'maxi-dent'),
        'items_list' => __('Список послуг', 'maxi-dent'),
        'items_list_navigation' => __('Навігація списку послуг', 'maxi-dent'),
        'filter_items_list' => __('Фільтрувати список послуг', 'maxi-dent'),
    );

    $services_args = array(
        'label' => __('Послуги', 'maxi-dent'),
        'description' => __('Стоматологічні послуги', 'maxi-dent'),
        'labels' => $services_labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4, // above directions
        'menu_icon' => 'dashicons-heart',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => 'services',
            'with_front' => true,
        ),
        'capability_type' => 'post',
        'show_in_rest' => true,
    );

    register_post_type('services', $services_args);
});

// Team post type
add_action('init', function () {

    $team_labels = array(
        'name' => _x('Команда', 'Post Type General Name', 'maxi-dent'),
        'singular_name' => _x('Член команди', 'Post Type Singular Name', 'maxi-dent'),
        'menu_name' => __('Команда', 'maxi-dent'),
        'name_admin_bar' => __('Член команди', 'maxi-dent'),
        'archives' => __('Архіви команди', 'maxi-dent'),
        'attributes' => __('Атрибути команди', 'maxi-dent'),
        'parent_item_colon' => __('Батьківський член команди:', 'maxi-dent'),
        'all_items' => __('Всі члени команди', 'maxi-dent'),
        'add_new_item' => __('Додати нового члена команди', 'maxi-dent'),
        'add_new' => __('Додати', 'maxi-dent'),
        'new_item' => __('Новий член команди', 'maxi-dent'),
        'edit_item' => __('Редагувати члена команди', 'maxi-dent'),
        'update_item' => __('Оновити члена команди', 'maxi-dent'),
        'view_item' => __('Переглянути члена команди', 'maxi-dent'),
        'view_items' => __('Переглянути членів команди', 'maxi-dent'),
        'search_items' => __('Пошук члена команди', 'maxi-dent'),
        'not_found' => __('Членів команди не знайдено', 'maxi-dent'),
        'not_found_in_trash' => __('Членів команди не знайдено у кошику', 'maxi-dent'),
        'featured_image' => __('Фото члена команди', 'maxi-dent'),
        'set_featured_image' => __('Встановити фото члена команди', 'maxi-dent'),
        'remove_featured_image' => __('Видалити фото члена команди', 'maxi-dent'),
        'use_featured_image' => __('Використовувати як фото члена команди', 'maxi-dent'),
        'insert_into_item' => __('Вставити до члена команди', 'maxi-dent'),
        'uploaded_to_this_item' => __('Завантажено до цього члена команди', 'maxi-dent'),
        'items_list' => __('Список членів команди', 'maxi-dent'),
        'items_list_navigation' => __('Навігація списку членів команди', 'maxi-dent'),
        'filter_items_list' => __('Фільтрувати список членів команди', 'maxi-dent'),
    );

    $team_args = array(
        'label' => __('Команда', 'maxi-dent'),
        'description' => __('Члени команди - Лікарі', 'maxi-dent'),
        'labels' => $team_labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-groups',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => 'team',
            'with_front' => true,
        ),
        'capability_type' => 'post',
        'show_in_rest' => true,
    );

    register_post_type('team', $team_args);
});

// Blog post type
add_action('init', function () {

    $blog_labels = array(
        'name' => _x('Блог', 'Post Type General Name', 'maxi-dent'),
        'singular_name' => _x('Стаття', 'Post Type Singular Name', 'maxi-dent'),
        'menu_name' => __('Блог', 'maxi-dent'),
        'name_admin_bar' => __('Стаття', 'maxi-dent'),
        'archives' => __('Архіви блогу', 'maxi-dent'),
        'attributes' => __('Атрибути статті', 'maxi-dent'),
        'parent_item_colon' => __('Батьківська стаття:', 'maxi-dent'),
        'all_items' => __('Усі статті', 'maxi-dent'),
        'add_new_item' => __('Додати нову статтю', 'maxi-dent'),
        'add_new' => __('Додати', 'maxi-dent'),
        'new_item' => __('Нова стаття', 'maxi-dent'),
        'edit_item' => __('Редагувати статтю', 'maxi-dent'),
        'update_item' => __('Оновити статтю', 'maxi-dent'),
        'view_item' => __('Переглянути статтю', 'maxi-dent'),
        'view_items' => __('Переглянути статті', 'maxi-dent'),
        'search_items' => __('Пошук статей', 'maxi-dent'),
        'not_found' => __('Статей не знайдено', 'maxi-dent'),
        'not_found_in_trash' => __('Статей не знайдено у кошику', 'maxi-dent'),
        'featured_image' => __('Обкладинка статті', 'maxi-dent'),
        'set_featured_image' => __('Встановити обкладинку', 'maxi-dent'),
        'remove_featured_image' => __('Видалити обкладинку', 'maxi-dent'),
        'use_featured_image' => __('Використовувати як обкладинку', 'maxi-dent'),
        'insert_into_item' => __('Вставити до статті', 'maxi-dent'),
        'uploaded_to_this_item' => __('Завантажено до цієї статті', 'maxi-dent'),
        'items_list' => __('Список статей', 'maxi-dent'),
        'items_list_navigation' => __('Навігація списку статей', 'maxi-dent'),
        'filter_items_list' => __('Фільтрувати список статей', 'maxi-dent'),
    );

    $blog_args = array(
        'label' => __('Блог', 'maxi-dent'),
        'description' => __('Статті для блогу', 'maxi-dent'),
        'labels' => $blog_labels,
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt',
            'revisions',
            'custom-fields',
        ),
        'taxonomies' => array('category', 'post_tag'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-edit-large',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'rewrite' => array(
            'slug' => 'blog',
            'with_front' => true,
        ),
        'capability_type' => 'post',
        'show_in_rest' => true,
    );

    register_post_type('blog', $blog_args);
});

// Hide default "Posts" in admin menu
add_action('admin_menu', function () {
    remove_menu_page('edit.php'); // Default posts list
});

// Prevent creating new default posts
add_action('init', function () {
    global $wp_post_types;

    if (isset($wp_post_types['post'])) {
        // Disallow creating new posts of built-in "post" type
        $wp_post_types['post']->cap->create_posts = 'do_not_allow';
    }
});


// Flush rewrite rules on theme activation
add_action('after_switch_theme', function () {
    add_action('init', 'flush_rewrite_rules', 999);
});
