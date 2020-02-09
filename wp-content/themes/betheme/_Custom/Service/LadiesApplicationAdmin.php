<?php


namespace Service;

use WP_List_Table;
use Repository\LadiesRepository;

if ( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}


class LadiesApplicationAdmin extends WP_List_Table
{

    /** Class constructor */
    private $ladiesRepository;

    public function __construct()
    {

        parent::__construct([
            'singular' => __('Lady', 'sp'), //singular name of the listed records
            'plural' => __('Ladies', 'sp'), //plural name of the listed records
            'ajax' => false //should this table support ajax?

        ]);
        require_once( ABSPATH . 'wp-content/themes/betheme/_Custom/Repository/LadiesRepository.php');
        $this->ladiesRepository = new LadiesRepository();
    }

    /** Text displayed when no customer data is available */
    public function no_items() {
        _e( 'No customers avaliable.', 'sp' );
    }

    /**
     * Method for name column
     *
     * @param array $item an array of DB data
     *
     * @return string
     */
    function column_name($item ) {

        // create a nonce
        $delete_nonce = wp_create_nonce( 'sp_delete_customer' );

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = [
            'delete' => sprintf(
                '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Delete</a>',
                esc_attr( $_REQUEST['page'] ),
                'delete',
                absint( $item['id'] ),
                $delete_nonce
            )
        ];

        return $title . $this->row_actions( $actions );
    }

    /**
     * Render a column when no column specific method exists.
     *
     * @param array $item
     * @param string $column_name
     *
     * @return mixed
     */
    public function column_default($item, $column_name ) {
        switch ( $column_name ) {
            case 'name':
            case 'date of birth':
            case 'email':
            case 'phone':
            case 'family_status':
            case 'kids':
            case 'height':
            case 'weight':
            case 'eye_color':
            case 'languages':
            case 'profession':
            case 'town':
            case 'country':
            case 'about':
                return $item[ $column_name ];
            default:
                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
    }

    /**
     * Render the bulk edit checkbox
     *
     * @param array $item
     *
     * @return string
     */
    function column_cb($item ) {
        return sprintf(
            '<input type="checkbox" name="bulk-delete[]" value="%s" />', $item['id']
        );
    }

    /**
     *  Associative array of columns
     *
     * @return array
     */
    function get_columns() {
        return [
            'cb'      => '<input type="checkbox" />',
            'name'    => __( 'Name', 'sp' ),
            'email' => __( 'email', 'sp' ),
            'phone'    => __( 'phone', 'sp' ),
            'family_status'    => __( 'family_status', 'sp' ),
            'kids'    => __( 'kids', 'sp' ),
            'height'    => __( 'height', 'sp' ),
            'weight'    => __( 'weight', 'sp' ),
            'eye_color'    => __( 'eye_color', 'sp' ),
            'languages'    => __( 'languages', 'sp' ),
            'profession'    => __( 'profession', 'sp' ),
            'town'    => __( 'town', 'sp' ),
            'country'    => __( 'country', 'sp' ),
            'about'    => __( 'about', 'sp' ),
        ];
    }

    /**
     * Columns to make sortable.
     *
     * @return array
     */
    public function get_sortable_columns() {
        return [
            'name' => ['name', true],
            'family_status' => ['name', false]
        ];
    }

    /**
     * Returns an associative array containing the bulk action
     *
     * @return array
     */
    public function get_bulk_actions() {
        $actions = [
            'bulk-delete' => 'Delete'
        ];

        return $actions;
    }

    /**
     * Handles data query and filter, sorting, and pagination.
     */
    public function prepare_items() {

        $this->_column_headers = $this->get_column_info();

        /** Process bulk action */
        $this->process_bulk_action();

        $per_page     = $this->get_items_per_page( 'customers_per_page', 5 );
        $current_page = $this->get_pagenum();
        $total_items  = $this->ladiesRepository->recordCount();

        $this->set_pagination_args( [
            'total_items' => $total_items, //WE have to calculate the total number of items
            'per_page'    => $per_page //WE have to determine how many items to show on a page
        ] );


        $this->items = $this->ladiesRepository->getLadies( $per_page, $current_page );
    }

    public function process_bulk_action() {

        //Detect when a bulk action is being triggered...
        if ( 'delete' === $this->current_action() ) {

            // In our file that handles the request, verify the nonce.
            $nonce = esc_attr( $_REQUEST['_wpnonce'] );

            if ( ! wp_verify_nonce( $nonce, 'sp_delete_customer' ) ) {
                die( 'Go get a life script kiddies' );
            }
            else {
                $this->ladiesRepository->deleteLady( absint( $_GET['customer'] ) );

                wp_redirect( esc_url( add_query_arg() ) );
                exit;
            }

        }

        // If the delete bulk action is triggered
        if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
            || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
        ) {

            $delete_ids = esc_sql( $_POST['bulk-delete'] );

            // loop over the array of record IDs and delete them
            foreach ( $delete_ids as $id ) {
                $this->ladiesRepository->deleteLady( $id );

            }

            wp_redirect( esc_url( add_query_arg() ) );
            exit;
        }
    }

}
