<?php
/**
 * Genesis Framework.
 *
 * WARNING: This file is part of the core Genesis Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package Genesis\Admin
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

/**
 * Registers a new admin page, providing content and corresponding menu item for the SEO Settings page.
 *
 * Although this class was added in 1.8.0, some of the methods were originally standalone functions added in previous
 * versions of Genesis.
 *
 * @package Genesis\Admin
 *
 * @since 1.8.0
 */
class Genesis_Admin_SEO_Settings extends Genesis_Admin_Boxes {

	/**
	 * Create an admin menu item and settings page.
	 *
	 * @since 1.8.0
	 */
	public function __construct() {

		$page_id = 'seo-settings';
		$this->help_base = GENESIS_VIEWS_DIR . '/help/seo-';

		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Genesis - SEO Settings', 'genesis' ),
				'menu_title'  => __( 'SEO Settings', 'genesis' )
			)
		);

		$page_ops = array(
			'save_button_text'  => __( 'Save Changes', 'genesis' ),
			'reset_button_text' => __( 'Reset Settings', 'genesis' ),
			'saved_notice_text' => __( 'Settings saved.', 'genesis' ),
			'reset_notice_text' => __( 'Settings reset.', 'genesis' ),
			'error_notice_text' => __( 'Error saving settings.', 'genesis' ),
		);

		$settings_field = GENESIS_SEO_SETTINGS_FIELD;

		$default_settings = apply_filters(
			'genesis_seo_settings_defaults',
			array(
				'append_site_title'            => 0,
				'doctitle_sep'                 => '–',
				'doctitle_seplocation'         => 'right',

				'append_description_home'      => 1,
				'home_h1_on'                   => 'title',
				'home_doctitle'                => '',
				'home_description'             => '',
				'home_keywords'                => '',
				'home_noindex'                 => 0,
				'home_nofollow'                => 0,
				'home_noarchive'               => 0,

				'canonical_archives'           => 1,

				'head_adjacent_posts_rel_link' => 0,
				'head_wlwmanifest_link'        => 0,
				'head_shortlink'               => 0,

				'noindex_cat_archive'          => 1,
				'noindex_tag_archive'          => 1,
				'noindex_author_archive'       => 1,
				'noindex_date_archive'         => 1,
				'noindex_search_archive'       => 1,
				'noarchive_cat_archive'        => 0,
				'noarchive_tag_archive'        => 0,
				'noarchive_author_archive'     => 0,
				'noarchive_date_archive'       => 0,
				'noarchive_search_archive'     => 0,
				'noarchive'                    => 0,
				'noodp'                        => 1,
				'noydir'                       => 1,
			)
		);

		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitizer_filters' ) );

	}

	/**
	 * Register each of the settings with a sanitization filter type.
	 *
	 * There is no filter for: doctitle_seplocation, home_h1_on
	 *
	 * @since 1.7.0
	 *
	 * @see \Genesis_Settings_Sanitizer::add_filter() Add sanitization filters to options.
	 */
	public function sanitizer_filters() {

		genesis_add_option_filter(
			'one_zero',
			$this->settings_field,
			array(
				'append_description_home',
				'append_site_title',
				'home_noindex',
				'home_nofollow',
				'home_noarchive',
				'head_adjacent_posts_rel_link',
				'head_wlwmanifest_link',
				'head_shortlink',
				'noindex_cat_archive',
				'noindex_tag_archive',
				'noindex_author_archive',
				'noindex_date_archive',
				'noindex_search_archive',
				'noarchive',
				'noarchive_cat_archive',
				'noarchive_tag_archive',
				'noarchive_author_archive',
				'noarchive_date_archive',
				'noarchive_search_archive',
				'noodp',
				'noydir',
			)
		);

		genesis_add_option_filter(
			'absint',
			$this->settings_field,
			array(
				'home_author',
			)
		);

		genesis_add_option_filter(
			'no_html',
			$this->settings_field,
			array(
				'home_doctitle',
				'home_description',
				'home_keywords',
				'doctitle_sep',
			)
		);

	}

	/**
	 * Contextual help content.
	 *
	 * @since 2.0.0
	 */
	public function help() {

		$this->add_help_tab( 'settings', __( 'SEO Settings', 'genesis' ) );
		$this->add_help_tab( 'doctitle', __( 'Doctitle Settings', 'genesis' ) );
		$this->add_help_tab( 'homepage', __( 'Homepage Settings', 'genesis' ) );
		$this->add_help_tab( 'dochead',  __( 'Document Head Settings', 'genesis' ) );
		$this->add_help_tab( 'robots',   __( 'Robots Meta Settings', 'genesis' ) );

		// Add help sidebar.
		$this->set_help_sidebar();

	}

	/**
	 * Register meta boxes on the SEO Settings page.
	 *
	 * @since 1.0.0
	 */
	public function metaboxes() {

		$this->add_meta_box( 'genesis-seo-settings-sitewide', __( 'Site-wide Settings', 'genesis' ) );
		$this->add_meta_box( 'genesis-seo-settings-homepage', __( 'Homepage Settings', 'genesis' ) );
		$this->add_meta_box( 'genesis-seo-settings-dochead', __( 'Document Head Settings', 'genesis' ) );
		$this->add_meta_box( 'genesis-seo-settings-robots', __( 'Robots Meta Settings', 'genesis' ) );

	}

}