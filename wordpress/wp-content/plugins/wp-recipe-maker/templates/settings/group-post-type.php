<?php
/**
 * Template for the plugin settings structure.
 *
 * @link       http://bootstrapped.ventures
 * @since      7.1.0
 *
 * @package    WP_Recipe_Maker
 * @subpackage WP_Recipe_Maker/templates/settings
 */

$post_type = array(
	'id' => 'postType',
	'icon' => 'files',
	'name' => __( 'Post Type & Taxonomies', 'wp-recipe-maker' ),
	'description' => __( 'By default a recipe only exists as part of a regular post. This ensures compatibility with most other plugins and themes. The advanced settings below allow you to fully customize things to your needs. Make sure you know what you are doing when changing these settings.', 'wp-recipe-maker' ),
	'documentation' => 'https://help.bootstrapped.ventures/article/291-the-recipe-post-type',
	'subGroups' => array(
		array(
			'name' => __( 'Recipe Post Type', 'wp-recipe-maker' ),
			'settings' => array(
				array(
					'id' => 'post_type_structure',
					'name' => __( 'Recipe Existence', 'wp-recipe-maker' ),
					'description' => __( 'How the recipe post type should exist.', 'wp-recipe-maker' ),
					'documentation' => 'https://help.bootstrapped.ventures/article/291-the-recipe-post-type',
					'type' => 'dropdown',
					'options' => array(
						'private' => __( 'Private - Recipes exist as part of their parent post only', 'wp-recipe-maker' ),
						'public' => __( 'Public - Recipes have their own URL as a custom post type', 'wp-recipe-maker' ),
					),
					'default' => 'private',
				),
				array(
					'id' => 'post_type_slug',
					'name' => __( 'Recipe Slug', 'wp-recipe-maker' ),
					'description' => __( 'Used as part of the URL when accessing recipes directly. Flush your permalinks after changing this setting.', 'wp-recipe-maker' ),
					'documentation' => 'https://help.bootstrapped.ventures/article/290-flushing-permalinks-to-fix-404-errors',
					'type' => 'text',
					'default' => 'recipe',
					'sanitize' => function( $value ) {
						return sanitize_title( $value );
					},
					'dependency' => array(
						'id' => 'post_type_structure',
						'value' => 'public',
					),
				),
				array(
					'id' => 'post_type_has_archive',
					'name' => __( 'Recipe Archive Page', 'wp-recipe-maker' ),
					'description' => __( 'A list of all recipes accessible at the /slug/ archive page. Flush your permalinks after changing this setting.', 'wp-recipe-maker' ),
					'documentation' => 'https://help.bootstrapped.ventures/article/290-flushing-permalinks-to-fix-404-errors',
					'type' => 'toggle',
					'default' => false,
					'dependency' => array(
						'id' => 'post_type_structure',
						'value' => 'public',
					),
				),
			),
		),
		array(
			'name' => __( 'Archive Pages', 'wp-recipe-maker' ),
			'settings' => array(
				array(
					'id' => 'post_type_archive_handle_output',
					'name' => __( 'Handle Archive Pages Output', 'wp-recipe-maker' ),
					'description' => __( 'Take control of the output for recipe archive pages. Disable to let your theme handle things.', 'wp-recipe-maker' ),
					'type' => 'toggle',
					'default' => true,
				),
				array(
					'id' => 'post_type_archive_output_template',
					'name' => __( 'Archive Pages Template', 'wp-recipe-maker' ),
					'description' => __( 'Template to output on recipe archive pages.', 'wp-recipe-maker' ),
					'type' => 'dropdownTemplateModern',
					'default' => 'excerpt',
					'dependency' => array(
						'id' => 'post_type_archive_handle_output',
						'value' => true,
					),
				),
			),
		),
	),
);
