<?php

use TEC\Tickets\Event;
use Tribe\Tickets\Plus\Commerce\WooCommerce\Orders\Data\Order_Summary;

class Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Report {
	/**
	 * Slug of the admin page for orders
	 *
	 * @var string
	 */
	public static $orders_slug = 'tickets-orders';

	/**
	 * Slug of the orders tab.
	 *
	 * @var string
	 */
	public static $tab_slug = 'tribe-tickets-plus-woocommerce-orders-report';

	/**
	 * @var string The orders page menu hook suffix.
	 *
	 * @see add_submenu_page()
	 */
	public $orders_page;

	/**
	 * The table that will display the ticket orders.
	 *
	 * @var Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Table
	 */
	protected $orders_table;

	/**
	 * Constructor!
	 */
	public function __construct() {
		// Register before the default priority of 10 to avoid submenu hook issues.
		add_action( 'admin_menu', [ $this, 'orders_page_register' ], 5 );
		add_filter( 'post_row_actions', [ $this, 'orders_row_action' ] );
		add_filter( 'tribe_filter_attendee_order_link', [ $this, 'filter_editor_orders_link' ], 10, 2 );

		// Register the WooCommerce orders report tab.
		$wc_tabbed_view = new Tribe__Tickets_Plus__Commerce__WooCommerce__Tabbed_View__Report_Tabbed_View();
		$wc_tabbed_view->register();
	}

	/**
	 * Registers the Orders admin page
	 */
	public function orders_page_register() {
		// The orders table only works with WooCommerce.
		if ( ! class_exists( 'WooCommerce' ) ) {
			return;
		}

		$candidate_post_id = Tribe__Utils__Array::get( $_GET, 'post_id', Tribe__Utils__Array::get( $_GET, 'event_id', 0 ) );
		$post_id           = absint( $candidate_post_id );

		if ( $post_id != $candidate_post_id ) {
			return;
		}

		if ( ! $this->can_access_page( $post_id ) ) {
			return;
		}

		$this->orders_page = add_submenu_page(
			'',
			'Order list',
			'Order list',
			'edit_posts',
			self::$orders_slug,
			[
				$this,
				'orders_page_inside',
			]
		);

		add_filter( 'tribe_filter_attendee_page_slug', [ $this, 'add_attendee_resources_page_slug' ] );
		add_action( 'admin_enqueue_scripts', tribe_callback( 'tickets.attendees', 'enqueue_assets' ) );
		add_action( 'admin_enqueue_scripts', tribe_callback( 'tickets.attendees', 'load_pointers' ) );
		add_action( "load-$this->orders_page", [ $this, 'orders_page_screen_setup' ] );
	}

	/**
	 * Filter the Order Link to EDD in the Ticket Editor Settings
	 *
	 * @since 4.10
	 *
	 * @param string $url     a url for the order page for an event.
	 * @param int    $post_id the post id for the current event.
	 *
	 * @return string
	 */
	public function filter_editor_orders_link( $url, $post_id ) {
		$provider = Tribe__Tickets__Tickets::get_event_ticket_provider( $post_id );

		if ( 'Tribe__Tickets_Plus__Commerce__WooCommerce__Main' === $provider ) {
			$url = remove_query_arg( 'page', $url );
			$url = add_query_arg( [ 'page' => 'tickets-orders' ], $url );
		}

		return $url;
	}

	/**
	 * Filter the page slugs that the attendee resources will load to add the order page
	 *
	 * @param array $slugs List of page slugs.
	 *
	 * @return array
	 */
	public function add_attendee_resources_page_slug( $slugs ) {
		$slugs[] = $this->orders_page;
		return $slugs;
	}

	/**
	 * Adds the "orders" link in the admin list row actions for each event.
	 *
	 * @param array $actions The actions.
	 *
	 * @return array
	 */
	public function orders_row_action( $actions ) {
		global $post;

		// the orders table only works with WooCommerce.
		if ( ! class_exists( 'WooCommerce' ) ) {
			return $actions;
		}

		if ( ! in_array( $post->post_type, Tribe__Tickets__Main::instance()->post_types(), true ) ) {
			return $actions;
		}

		if ( ! $this->can_access_page( $post->ID ) ) {
			return $actions;
		}

		$has_tickets = count( (array) Tribe__Tickets_Plus__Commerce__WooCommerce__Main::get_instance()->get_tickets( $post->ID ) );

		if ( ! $has_tickets ) {
			return $actions;
		}

		$url = self::get_tickets_report_link( $post );

		$actions['tickets_orders'] = sprintf(
			'<a title="%s" href="%s">%s</a>',
			esc_html__( 'See purchases for this event', 'event-tickets-plus' ),
			esc_url( $url ),
			esc_html__( 'Orders', 'event-tickets-plus' )
		);

		return $actions;
	}

	/**
	 * Setups the Orders screen data.
	 */
	public function orders_page_screen_setup() {
		$this->orders_table = new Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Table();
		wp_enqueue_script( 'jquery-ui-dialog' );

		add_filter( 'admin_title', [ $this, 'orders_admin_title' ], 10, 2 );
	}

	/**
	 * Sets the browser title for the Orders admin page.
	 * Uses the event title.
	 *
	 * @param string $admin_title The admin title.
	 * @param string $title The title.
	 *
	 * @return string
	 */
	public function orders_admin_title( $admin_title, $title ) {
		if ( ! empty( $_GET['event_id'] ) ) {
			$event       = get_post( absint( $_GET['event_id'] ) );
			$admin_title = sprintf( esc_html_x( '%s - Order list', 'Browser title', 'event-tickets-plus' ), $event->post_title );
		}

		return $admin_title;
	}

	/**
	 * Renders the Orders page
	 */
	public function orders_page_inside() {
		$this->orders_table->prepare_items();

		$event_id = isset( $_GET['event_id'] ) ? absint( $_GET['event_id'] ) : 0;
		$event    = get_post( $event_id );

		/**
		 * Filters whether or not fees are being passed to the end user (purchaser)
		 *
		 * @var boolean $pass_fees Whether or not to pass fees to user
		 * @var int $event_id Event post ID
		 */
		Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Table::$pass_fees_to_user = apply_filters( 'tribe_tickets_pass_fees_to_user', true, $event_id );

		/**
		 * Filters the fee percentage to apply to a ticket/order
		 *
		 * @var float $fee_percent Fee percentage
		 */
		Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Table::$fee_percent = apply_filters( 'tribe_tickets_fee_percent', 0, $event_id );

		/**
		 * Filters the flat fee to apply to a ticket/order
		 *
		 * @var float $fee_flat Flat fee
		 */
		Tribe__Tickets_Plus__Commerce__WooCommerce__Orders__Table::$fee_flat = apply_filters( 'tribe_tickets_fee_flat', 0, $event_id );

		ob_start();
		$this->orders_table->display();
		$table = ob_get_clean();

		// Build and render the tabbed view from Event Tickets and set this as the active tab.
		$tabbed_view = new Tribe__Tickets__Commerce__Orders_Tabbed_View();
		$tabbed_view->set_active( self::$tab_slug );
		$tabbed_view->render();

		$tickets_admin_views = tribe( 'tickets.admin.views' );
		$order_summary_data  = new Order_Summary( $event_id );
		if ( is_callable( [ $order_summary_data, 'init' ] ) ) {
			$order_summary_data->init();
		}
		$post_type_object       = get_post_type_object( $event->post_type );
		$post_singular_label    = $post_type_object->labels->singular_name;
		$order_summary_context  = [
			'post_id'             => $event_id,
			'post'                => $event,
			'post_singular_label' => $post_singular_label,
			'order_summary'       => $order_summary_data,
		];
		$order_summary_template = $tickets_admin_views->template( 'commerce/reports/orders/summary', $order_summary_context, false );

		/** @var \Tribe__Tickets_Plus__Admin__Views $view */
		$view = tribe( 'tickets-plus.admin.views' );
		$view->template(
			'woocommerce-orders',
			[
				'event_id'      => $event_id,
				'event'         => $event,
				'order_summary' => $order_summary_template,
				'table'         => $table,
			]
		);
	}

	/**
	 * Returns the link to the "Orders" report for this post.
	 *
	 * @since 5.7.4 - tec_tickets_filter_event_id filter to normalize the $post_id.
	 *
	 * @param WP_Post $post Post object.
	 *
	 * @return string The absolute URL.
	 */
	public static function get_tickets_report_link( $post ) {
		$post_id = Event::filter_event_id( $post->ID, 'woo-orders-report-link' );

		return add_query_arg(
			[
				'post_type' => $post->post_type,
				'page'      => self::$orders_slug,
				'event_id'  => $post_id,
			],
			admin_url( 'edit.php' )
		);
	}

	/**
	 * Returns a normalized array of WooCommerce order statuses with the 'wc-' prefix.
	 *
	 * @since 5.9.3
	 *
	 * @return string[] Normalized WooCommerce order statuses.
	 */
	private static function get_statuses(): array {
		$status_manager = tribe( 'tickets.status' );
		$order_statuses = (array) $status_manager->get_statuses_by_action( 'all', 'woo' );

		$normalized = array_map(
			static function ( string $status ): string {
				$status = strtolower( $status );
				return str_starts_with( $status, 'wc-' ) ? $status : 'wc-' . $status;
			},
			$order_statuses
		);

		return array_values( array_unique( $normalized ) );
	}

	/**
	 * Retrieves a comma-separated list of WooCommerce order statuses for use in queries.
	 *
	 * @since 5.9.3
	 *
	 * @return string Comma-separated list of formatted WooCommerce order statuses.
	 */
	public static function get_formatted_status_list(): string {
		return implode( ',', self::get_statuses() );
	}

	/**
	 * Get total sales and line totals per product grouped by order status.
	 *
	 * Uses two focused queries to enable MySQL index usage on both lookups:
	 *  1. Resolve order_item_ids via the composite index on (meta_key, meta_value).
	 *  2. Aggregate totals using IN() on item IDs and statuses — both indexable,
	 *     unlike FIND_IN_SET (prevents status index use) or a derived-table JOIN
	 *     (forces temp-table materialization).
	 *
	 * Note: $order_item_ids grows linearly with order volume. For very high-volume
	 * products the IN() list will be large; consider chunking if needed.
	 *
	 * @since 5.9.1 Updated logic to new WooCommerce HPOS requirement.
	 * @since 5.9.3 Refactored WooCommerce ORM to use direct query.
	 * @since 6.9.2 HPOS: query wc_orders + order items instead of wc_order_product_lookup
	 *              so mixed orders (ticket + regular product) report correct ticket sales.
	 *              Refactored to two-query approach for full index usage on both paths.
	 *
	 * @param int $product_id The ID of the product to retrieve sales data for.
	 *
	 * @return array|bool Associative array keyed by order status containing objects with
	 *                    total quantities and line totals, or false on invalid input.
	 */
	public static function get_total_sales_per_productby_status( $product_id ) {
		global $wpdb;

		if ( ! is_numeric( $product_id ) || $product_id <= 0 ) {
			return false;
		}

		$product_id            = absint( $product_id );
		$statuses              = self::get_statuses();
		$total_sales_by_status = array_fill_keys( $statuses, [] );

		/*
		 * Query 1: Resolve order_item_ids for this product.
		 * Hits the composite index on (meta_key, meta_value); shared by both paths.
		 */
		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
		$order_item_ids = $wpdb->get_col(
			$wpdb->prepare(
				"SELECT DISTINCT order_item_id
				FROM {$wpdb->prefix}woocommerce_order_itemmeta
				WHERE meta_key IN ('_product_id', '_variation_id')
				AND meta_value = %d",
				$product_id
			)
		);

		if ( empty( $order_item_ids ) ) {
			return $total_sales_by_status;
		}

		/*
		 * Query 2: Aggregate qty and line totals grouped by status.
		 * Table/column names differ between legacy (posts) and HPOS (wc_orders) but the
		 * query structure is identical, so we parameterise the identifiers and run one template.
		 */
		if ( tribe( 'tickets-plus.commerce.woo' )->is_hpos_enabled() ) {
			$orders_table      = "{$wpdb->prefix}wc_orders";
			$orders_id_col     = 'id';
			$orders_type_col   = 'type';
			$orders_status_col = 'status';
		} else {
			$orders_table      = "{$wpdb->prefix}posts";
			$orders_id_col     = 'ID';
			$orders_type_col   = 'post_type';
			$orders_status_col = 'post_status';
		}

		$order_item_ids      = array_map( 'absint', $order_item_ids );
		$id_placeholders     = implode( ',', array_fill( 0, count( $order_item_ids ), '%d' ) );
		$status_placeholders = implode( ',', array_fill( 0, count( $statuses ), '%s' ) );
		$query_args          = array_merge( $order_item_ids, $statuses );

		// Table/column identifiers are derived from hardcoded strings — not user input.
		// $id_placeholders and $status_placeholders are built solely from array_fill('%d'/'%s').
		// phpcs:disable WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare
		$query = $wpdb->prepare(
			"SELECT orders.{$orders_status_col} AS status,
				COALESCE(SUM(CASE WHEN woim.meta_key = '_qty' THEN woim.meta_value ELSE 0 END), 0) AS total_qty,
				COALESCE(SUM(CASE WHEN woim.meta_key = '_line_total' THEN woim.meta_value ELSE 0 END), 0) AS total_line_total
			FROM {$orders_table} AS orders
			INNER JOIN {$wpdb->prefix}woocommerce_order_items AS woi ON orders.{$orders_id_col} = woi.order_id
			INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS woim ON woi.order_item_id = woim.order_item_id
			WHERE woi.order_item_id IN ({$id_placeholders})
			AND woim.meta_key IN ('_qty', '_line_total')
			AND woi.order_item_type = 'line_item'
			AND orders.{$orders_type_col} = 'shop_order'
			AND orders.{$orders_status_col} IN ({$status_placeholders})
			GROUP BY orders.{$orders_status_col}",
			...$query_args
		);
		// phpcs:enable WordPress.DB.PreparedSQL.InterpolatedNotPrepared, WordPress.DB.PreparedSQLPlaceholders.UnfinishedPrepare

		// phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.NotPrepared
		$results = $wpdb->get_results( $query );

		foreach ( $results as $result ) {
			$status_key = strtolower( $result->status );
			if ( ! str_starts_with( $status_key, 'wc-' ) ) {
				$status_key = 'wc-' . $status_key;
			}
			$total_sales_by_status[ $status_key ][] = (object) [
				'_qty'        => $result->total_qty,
				'_line_total' => $result->total_line_total,
			];
		}

		return $total_sales_by_status;
	}

	/**
	 * Checks if the current user can access a page based on post ownership and capabilities.
	 *
	 * This method determines access by checking if the current user is the author of the post
	 * or if they have the capability to edit others' posts (edit_others_posts) within the same post type.
	 * If neither condition is met, access is denied.
	 *
	 * @since 5.9.4
	 *
	 * @param int $post_id The ID of the post to check access against.
	 *
	 * @return bool True if the user can access the page, false otherwise.
	 */
	public function can_access_page( int $post_id ): bool {
		$post = get_post( $post_id );
		// Ensure $post is valid to prevent errors in cases where $post_id might be invalid.
		if ( ! $post ) {
			return false;
		}

		$post_type_object      = get_post_type_object( $post->post_type );
		$can_edit_others_posts = current_user_can( $post_type_object->cap->edit_others_posts );

		// Return true if the user can edit others' posts of this type or if they're the author, false otherwise.
		$has_access = $can_edit_others_posts || get_current_user_id() == $post->post_author;

		$page_slug = self::$orders_slug;

		/**
		 * Filters whether a user can access the attendees page for a given post.
		 *
		 * @since 5.9.4
		 *
		 * @param bool    $has_access True if the user has access, false otherwise.
		 * @param int     $post_id The ID of the post being checked.
		 * @param WP_Post $post The post object.
		 */
		return apply_filters( "tec_tickets_report_{$page_slug}_page_role_access", $has_access, $post_id, $post );
	}
}
