<?php

// Disable front-end admin bar
add_filter('show_admin_bar', '__return_false');

register_nav_menu('primary', __('Primary Menu'));

load_theme_textdomain('montes-one', TEMPLATEPATH.'/languages/');

function montes_one_widgets_init()
{
	register_sidebar(array(
		'name' => __('Lateral Sidebar'),
		'id' => 'lateral-sidebar',
		'description' => __('Lateral Sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Top Sidebar'),
		'id' => 'top-sidebar',
		'description' => __('Top Sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));

	register_sidebar(array(
		'name' => __('Footer Sidebar'),
		'id' => 'footer-sidebar',
		'description' => __('Footer Sidebar.'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}

add_action('widgets_init', 'montes_one_widgets_init');


/**
 * Walker for integration of WordPress custom menu with Bootstrap navbar.
 * Taken from https://bitbucket.org/Rarst/hybrid-wing/src
 */
class Walker_Navbar_Menu extends Walker_Nav_Menu {

    public $dropdown_enqueued;

    /**
     * Check if required script queued.
     */
    function __construct() {

        $this->dropdown_enqueued = wp_script_is( 'bootstrap-dropdown', 'queue' );
    }

    /**
     * Adjust classes for individual menu items.
     */
    function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {

        if ( $element->current )
            $element->classes[] = 'active';

        $element->is_dropdown = ! empty( $children_elements[$element->ID] );

        if ( $element->is_dropdown ) {

            if( 0 == $depth  )
                $element->classes[] = 'dropdown';
            elseif( 1 == $depth )
                $element->classes[] = 'dropdown-submenu';
        }

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

    /**
     * Enqueue script and set class for list.
     */
    function start_lvl( &$output, $depth ) {

        if ( ! $this->dropdown_enqueued ) {
            wp_enqueue_script( 'bootstrap-dropdown' );
            $this->dropdown_enqueued = true;
        }

        $indent  = str_repeat( "\t", $depth );
        $class   = ( $depth < 2 ) ? 'dropdown-menu' : 'unstyled';
        $output .= "\n{$indent}<ul class='{$class}'>\n";
    }

    /**
     * Adjust markup for top level dropdown menu item.
     */
    function start_el( &$output, $item, $depth, $args ) {

        $item_html = '';
        parent::start_el( $item_html, $item, $depth, $args );

        if ( $item->is_dropdown && ( 0 == $depth ) ) {
            $item_html = str_replace( '<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html );
            $item_html = str_replace( '</a>', '<b class="caret"></b></a>', $item_html );
            $item_html = str_replace( esc_attr( $item->url ), '#', $item_html );
        }

        $output .= $item_html;
    }
}
