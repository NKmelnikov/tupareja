<?php


namespace Service;

use Helper\CustomHelper;
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
    function column_name($item) {

        // create a nonce
        $edit_nonce = wp_create_nonce( 'sp_edit_customer' );
        $activate_nonce = wp_create_nonce( 'sp_activate_customer' );

        $title = '<strong>' . $item['name'] . '</strong>';

        $actions = [
            'edit' => sprintf(
                '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Edit</a>',
                'lady_edit',
                'edit',
                absint( $item['id'] ),
                $edit_nonce
            ),
            /*'activate' => sprintf(
                '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Activate</a>',
                esc_attr( $_REQUEST['page'] ),
                'activate',
                absint( $item['id'] ),
                $activate_nonce
            ),*/
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
        $_item = $item[ $column_name ];
        $image_src = $this->handle_image_src($_item);
        //Todo default image
        switch ( $column_name ) {
            case 'activated':
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
            case 'man_wish_age':
            case 'video_link':
            case 'about':
                return $_item;
            case 'main_image_path':
                return "<img src='$image_src' width='39' height='50'>";
            default:
                return print_r( $item, true ); //Show the whole array for troubleshooting purposes
        }
    }

    public function handle_image_src($src){
        preg_match_all('`(\/wp-content.*)`im', $src, $new_src, PREG_SET_ORDER);
//        echo print_r($new_src[0],true);
        if (!empty($new_src)) {
            return $new_src[0][0];
        }

        return '/wp-content/themes/betheme/images/woman-default-picture.png';
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
            'main_image_path'      => __( 'Обложка', 'sp' ),
            'activated'    => __( 'Активирован', 'sp' ),
            'name'    => __( 'Имя', 'sp' ),
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
            'man_wish_age'    => __( 'man_wish_age', 'sp' ),
            'video_link'    => __( 'video_link', 'sp' ),
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
            'activated' => ['activated', true],
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

        $per_page     = $this->get_items_per_page( 'customers_per_page', 10);
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

	public function ladiesUpdate($post)
	{
		$post = $this->validatePost($post);
		$first_key = key($post);

		if($first_key === 'error'){
			return ['error' => $post['error']];
		}

		$this->ladiesRepository->updateLadiesApplication($post);
		return ['success' => 'Анкета успешно обновлена'];
	}

	private function validatePost($post)
	{
		require_once '../Helper/CustomHelper.php';
		$post =  [
			'id' => CustomHelper::sanitiseText($post['le1-id']),
			'name' => CustomHelper::sanitiseText($post['le1-name']),
			'date_of_birth' => CustomHelper::sanitiseText($post['le1-dateOfBirth']),
			'email' => sanitize_email($post['le1-email']),
			'phone' => CustomHelper::sanitiseText($post['le1-phone']),
			'family_status' => CustomHelper::sanitiseText($post['le1-familyStatus']),
			'kids' => CustomHelper::sanitiseText($post['le1-kids']),
			'height' => CustomHelper::sanitiseText($post['le1-height']),
			'weight' => CustomHelper::sanitiseText($post['le1-weight']),
			'eye_color' => CustomHelper::sanitiseText($post['le1-eyeColor']),
			'languages' => CustomHelper::sanitiseText($post['le1-languages']),
			'profession' => CustomHelper::sanitiseText($post['le1-profession']),
			'town' => CustomHelper::sanitiseText($post['le1-town']),
			'country' => CustomHelper::sanitiseText($post['le1-country']),
			'about' => CustomHelper::sanitiseText($post['le1-about']),
			'smoking' => CustomHelper::sanitiseText($post['le1-smoking']),
			'man_wish_age' => CustomHelper::sanitiseText($post['le1-man-wish-age']),
			'wishes_to_man' => CustomHelper::sanitiseText($post['le1-wishes-to-man']),
			'video_link' => esc_url($post['le1-video-link']),
			'path_to_images' => CustomHelper::sanitiseText($post['le1-path-to-images']),
			'main_image_path' => CustomHelper::sanitiseText($post['le1-main-image-path']),
			'activated' => CustomHelper::sanitiseText($post['le1-activated'])
		];

		return $post;
	}

}
