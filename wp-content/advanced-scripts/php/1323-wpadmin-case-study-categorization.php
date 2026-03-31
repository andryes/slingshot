<?php defined('WPINC') or die ?><?php

// Add a new column to the Portfolio post type in the admin area
function add_case_study_number_column($columns) {
    $columns['case_study_number'] = __('Case Study Number');
    return $columns;
}
add_filter('manage_portfolio_posts_columns', 'add_case_study_number_column');

// Populate the Case Study Number column with "Yes" or "No"
function show_case_study_number_column($column, $post_id) {
    if ($column == 'case_study_number') {
        $case_study_number = wp_get_post_terms($post_id, 'project-attributes', array("fields" => "names"));
        if (!empty($case_study_number)) {
            echo __('Yes');
        } else {
            echo __('No');
        }
    }
}
add_action('manage_portfolio_posts_custom_column', 'show_case_study_number_column', 10, 2);

// Make the Case Study Number column sortable
function case_study_number_column_sortable($columns) {
    $columns['case_study_number'] = 'case_study_number';
    return $columns;
}
add_filter('manage_edit-portfolio_sortable_columns', 'case_study_number_column_sortable');

// Handle sorting by the Case Study Number column
function case_study_number_column_orderby($query) {
    if (!is_admin()) {
        return;
    }

    $orderby = $query->get('orderby');
    if ('case_study_number' == $orderby) {
        $query->set('meta_key', 'case_study_number');
        $query->set('orderby', 'meta_value');
    }
}
add_action('pre_get_posts', 'case_study_number_column_orderby');
