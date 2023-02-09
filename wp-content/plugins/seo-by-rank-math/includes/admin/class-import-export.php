<?php
/**
 * The Import Export Class
 *
 * @since      0.9.0
 * @package    RankMath
 * @subpackage RankMath\Admin
 * @author     Rank Math <support@rankmath.com>
 */

namespace RankMath\Admin;

use RankMath\Helper;
use RankMath\Runner;
use RankMath\Traits\Ajax;
use RankMath\Traits\Hooker;
use MyThemeShop\Admin\Page;
use MyThemeShop\Helpers\Param;
use MyThemeShop\Helpers\WordPress;
use RankMath\Admin\Importers\Detector;

defined( 'ABSPATH' ) || exit;

/**
 * Import_Export class.
 */
class Import_Export implements Runner {

	use Hooker, Ajax;

	/**
	 * Register hooks.
	 */
	public function hooks() {
		$this->action( 'admin_init', 'handler' );
		$this->action( 'admin_enqueue_scripts', 'enqueue', 1 );
		$this->filter( 'rank_math/tools/pages', 'add_status_page', 30 );
		$this->filter( 'rank_math/export/settings', 'export_other_panels', 10, 2 );
		$this->action( 'rank_math/import/settings/pre_import', 'run_backup', 10, 0 );

		$this->ajax( 'create_backup', 'create_backup' );
		$this->ajax( 'delete_backup', 'delete_backup' );
		$this->ajax( 'restore_backup', 'restore_backup' );
		$this->ajax( 'clean_plugin', 'clean_plugin' );
		$this->ajax( 'import_plugin', 'import_plugin' );
	}

	/**
	 * Add subpage to Status & Tools screen.
	 *
	 * @param array $pages Pages.
	 * @return array       New pages.
	 */
	public function add_status_page( $pages ) {
		if ( Helper::is_advanced_mode() ) {
			$pages['import_export'] = [
				'url'   => 'status',
				'args'  => 'view=import_export',
				'cap'   => 'manage_options',
				'title' => __( 'Import & Export', 'rank-math' ),
				'class' => '\\RankMath\\Admin\\Import_Export',
			];
		}

		return $pages;
	}

	/**
	 * Display Import/Export tools.
	 *
	 * @return void
	 */
	public function display() {
		include( $this->get_view( 'main' ) );
	}

	/**
	 * Get view file.
	 *
	 * @param string $view View filename.
	 *
	 * @return string Complete path to view
	 */
	public function get_view( $view ) {
		$view = sanitize_key( $view );
		return rank_math()->admin_dir() . "views/import-export/{$view}.php";
	}

	/**
	 * Add JSON.
	 *
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'rank-math-import-export', rank_math()->plugin_url() . 'assets/admin/js/import-export.js' );
		wp_enqueue_style( 'cmb2-styles' );
		wp_enqueue_style( 'rank-math-common' );
		wp_enqueue_style( 'rank-math-cmb2' );

		Helper::add_json( 'importConfirm', esc_html__( 'Are you sure you want to import settings into Rank Math? Don\'t worry, your current configuration will be saved as a backup.', 'rank-math' ) );
		Helper::add_json( 'restoreConfirm', esc_html__( 'Are you sure you want to restore this backup? Your current configuration will be overwritten.', 'rank-math' ) );
		Helper::add_json( 'deleteBackupConfirm', esc_html__( 'Are you sure you want to delete this backup?', 'rank-math' ) );
		Helper::add_json( 'cleanPluginConfirm', esc_html__( 'Are you sure you want erase traces of plugin?', 'rank-math' ) );
	}

	/**
	 * Handle import or export.
	 */
	public function handler() {
		$object_id = Param::post( 'object_id' );
		if ( false === $object_id ) {
			return;
		}

		if ( ! Helper::has_cap( 'general' ) ) {
			return false;
		}

		if ( 'export-plz' === $object_id && check_admin_referer( 'rank-math-export-settings' ) ) {
			$this->export();
		}

		if ( isset( $_FILES['import-me'] ) && 'import-plz' === $object_id && check_admin_referer( 'rank-math-import-settings' ) ) {
			$this->import();
		}
	}

	/**
	 * Handles AJAX run plugin clean.
	 */
	public function clean_plugin() {
		$this->verify_nonce( 'rank-math-ajax-nonce' );
		$this->has_cap_ajax( 'general' );

		$result = Detector::run_by_slug( Param::post( 'pluginSlug' ), 'cleanup' );

		if ( $result['status'] ) {
			/* translators: Plugin name */
			$this->success( sprintf( esc_html__( 'Cleanup of %s data successfully done.', 'rank-math' ), $result['importer']->get_plugin_name() ) );
		}

		/* translators: Plugin name */
		$this->error( sprintf( esc_html__( 'Cleanup of %s data failed.', 'rank-math' ), $result['importer']->get_plugin_name() ) );
	}

	/**
	 * Handles AJAX run plugin import.
	 */
	public function import_plugin() {
		$this->verify_nonce( 'rank-math-ajax-nonce' );
		$this->has_cap_ajax( 'general' );

		$perform = Param::post( 'perform' );
		if ( ! $this->is_action_allowed( $perform ) ) {
			$this->error( esc_html__( 'Action not allowed.', 'rank-math' ) );
		}

		try {
			$result = Detector::run_by_slug( Param::post( 'pluginSlug' ), 'import', $perform );
			$this->success( $result );
		} catch ( \Exception $e ) {
			$this->error( $e->getMessage() );
		}
	}

	/**
	 * Handles AJAX create backup.
	 */
	public function create_backup() {
		$this->verify_nonce( 'rank-math-ajax-nonce' );
		$this->has_cap_ajax( 'general' );

		$key = $this->run_backup();
		if ( is_null( $key ) ) {
			$this->error( esc_html__( 'Unable to create backup this time.', 'rank-math' ) );
		}

		$this->success(
			[
				'key'     => $key,
				/* translators: Backup formatted date */
				'backup'  => sprintf( esc_html__( 'Backup: %s', 'rank-math' ), date_i18n( 'M jS Y, H:i a', $key ) ),
				'message' => esc_html__( 'Backup created successfully.', 'rank-math' ),
			]
		);
	}

	/**
	 * Handles AJAX delete backup.
	 */
	public function delete_backup() {
		$this->verify_nonce( 'rank-math-ajax-nonce' );
		$this->has_cap_ajax( 'general' );

		$key = Param::post( 'key' );
		if ( ! $key ) {
			$this->error( esc_html__( 'No backup key found to delete.', 'rank-math' ) );
		}

		$this->run_backup( 'delete', $key );
		$this->success( esc_html__( 'Backup successfully deleted.', 'rank-math' ) );
	}

	/**
	 * Handles AJAX restore backup.
	 */
	public function restore_backup() {
		$this->verify_nonce( 'rank-math-ajax-nonce' );
		$this->has_cap_ajax( 'general' );

		$key = Param::post( 'key' );
		if ( ! $key ) {
			$this->error( esc_html__( 'No backup key found to restore.', 'rank-math' ) );
		}

		if ( ! $this->run_backup( 'restore', $key ) ) {
			$this->error( esc_html__( 'Backup does not exist.', 'rank-math' ) );
		}

		$this->success( esc_html__( 'Backup restored successfully.', 'rank-math' ) );
	}

	/**
	 * Run backup actions.
	 *
	 * @param  string $action Action to perform.
	 * @param  array  $key    Key to backup.
	 * @return mixed
	 */
	public function run_backup( $action = 'add', $key = null ) {
		$backups = get_option( 'rank_math_backups', [] );

		// Restore.
		if ( 'restore' === $action ) {
			if ( ! isset( $backups[ $key ] ) ) {
				return false;
			}

			$this->do_import_data( $backups[ $key ], true );

			return true;
		}

		// Add.
		if ( 'add' === $action ) {
			$key     = current_time( 'U' );
			$backups = [ $key => $this->get_export_data() ] + $backups;
		}

		// Delete.
		if ( 'delete' === $action && isset( $backups[ $key ] ) ) {
			unset( $backups[ $key ] );
		}

		update_option( 'rank_math_backups', $backups );

		return $key;
	}

	/**
	 * Handle export.
	 */
	private function export() {
		$panels   = Param::post( 'panels', [], FILTER_DEFAULT, FILTER_REQUIRE_ARRAY );
		$data     = $this->get_export_data( $panels );
		$filename = 'rank-math-settings-' . date_i18n( 'Y-m-d-H-i-s' ) . '.txt';

		header( 'Content-Type: application/txt' );
		header( 'Content-Disposition: attachment; filename=' . $filename );
		header( 'Cache-Control: no-cache, no-store, must-revalidate' );
		header( 'Pragma: no-cache' );
		header( 'Expires: 0' );

		echo wp_json_encode( $data );
		exit;
	}

	/**
	 * Handle import.
	 */
	private function import() {
		$file = $this->has_valid_file();
		if ( false === $file ) {
			return false;
		}

		// Parse Options.
		$wp_filesystem = WordPress::get_filesystem();
		$settings      = $wp_filesystem->get_contents( $file['file'] );
		$settings      = json_decode( $settings, true );

		\unlink( $file['file'] );

		if ( $this->do_import_data( $settings ) ) {
			Helper::add_notification( esc_html__( 'Settings successfully imported. Your old configuration has been saved as a backup.', 'rank-math' ), [ 'type' => 'success' ] );
			return;
		}

		Helper::add_notification( esc_html__( 'No settings found to be imported.', 'rank-math' ), [ 'type' => 'info' ] );
	}

	/**
	 * Import has valid file.
	 *
	 * @return mixed
	 */
	private function has_valid_file() {
		$file = wp_handle_upload( $_FILES['import-me'] );
		if ( is_wp_error( $file ) ) {
			Helper::add_notification( esc_html__( 'Settings could not be imported:', 'rank-math' ) . ' ' . $file->get_error_message(), [ 'type' => 'error' ] );
			return false;
		}

		if ( isset( $file['error'] ) ) {
			Helper::add_notification( esc_html__( 'Settings could not be imported:', 'rank-math' ) . ' ' . $file['error'], [ 'type' => 'error' ] );
			return false;
		}

		if ( ! isset( $file['file'] ) ) {
			Helper::add_notification( esc_html__( 'Settings could not be imported: Upload failed.', 'rank-math' ), [ 'type' => 'error' ] );
			return false;
		}

		return $file;
	}

	/**
	 * Does import data.
	 *
	 * @param  array $data           Import data.
	 * @param  bool  $suppress_hooks Suppress hooks or not.
	 * @return bool
	 */
	private function do_import_data( array $data, $suppress_hooks = false ) {
		$this->run_import_hooks( 'pre_import', $data, $suppress_hooks );

		// Import options.
		$down = $this->set_options( $data );

		// Import capabilities.
		if ( ! empty( $data['role-manager'] ) ) {
			$down = true;
			Helper::set_capabilities( $data['role-manager'] );
		}

		// Import redirections.
		if ( ! empty( $data['redirections'] ) ) {
			$down = true;
			$this->set_redirections( $data['redirections'] );
		}

		$this->run_import_hooks( 'after_import', $data, $suppress_hooks );

		return $down;
	}

	/**
	 * Set options from data.
	 *
	 * @param array $data An array of data.
	 */
	private function set_options( $data ) {
		$set  = false;
		$hash = [
			'modules' => 'rank_math_modules',
			'general' => 'rank-math-options-general',
			'titles'  => 'rank-math-options-titles',
			'sitemap' => 'rank-math-options-sitemap',
		];

		foreach ( $hash as $key => $option_key ) {
			if ( ! empty( $data[ $key ] ) ) {
				$set = true;
				update_option( $option_key, $data[ $key ] );
			}
		}

		return $set;
	}

	/**
	 * Set redirections.
	 *
	 * @param array $redirections An array of redirections to import.
	 */
	private function set_redirections( $redirections ) {
		foreach ( $redirections as $key => $redirection ) {
			$matched = \RankMath\Redirections\DB::match_redirections_source( $redirection['sources'] );
			if ( ! empty( $matched ) ) {
				continue;
			}

			$sources = maybe_unserialize( $redirection['sources'] );
			if ( ! is_array( $sources ) ) {
				continue;
			}

			\RankMath\Redirections\DB::add(
				[
					'url_to'      => $redirection['url_to'],
					'sources'     => $sources,
					'header_code' => $redirection['header_code'],
					'hits'        => $redirection['hits'],
					'created'     => $redirection['created'],
					'updated'     => $redirection['updated'],
				]
			);
		}
	}

	/**
	 * Run import hooks
	 *
	 * @param string $hook     Hook to fire.
	 * @param array  $data     Import data.
	 * @param bool   $suppress Suppress hooks or not.
	 */
	private function run_import_hooks( $hook, $data, $suppress ) {
		if ( ! $suppress ) {
			/**
			 * Fires while importing settings.
			 *
			 * @since 0.9.0
			 *
			 * @param array $data Import data.
			 */
			$this->do_action( 'import/settings/' . $hook, $data );
		}
	}

	/**
	 * Gets export data.
	 *
	 * @param array $panels Which panels to export. All panels will be exported if this param is empty.
	 * @return array
	 */
	private function get_export_data( array $panels = [] ) {
		if ( ! $panels ) {
			$panels = [ 'general', 'titles', 'sitemap', 'role-manager', 'redirections' ];
		}

		$settings = rank_math()->settings->all_raw();
		foreach ( $panels as $panel ) {
			if ( isset( $settings[ $panel ] ) ) {
				$data[ $panel ] = $settings[ $panel ];
				continue;
			}

			$data = $this->do_filter( 'export/settings', $data, $panel );
		}

		$data['modules'] = get_option( 'rank_math_modules', [] );

		return $data;
	}

	/**
	 * Export other panels.
	 *
	 * @param array  $data  Gathered data.
	 * @param string $panel Panel id.
	 *
	 * @return array
	 */
	public function export_other_panels( $data, $panel ) {
		if ( 'role-manager' === $panel ) {
			$data['role-manager'] = Helper::get_roles_capabilities();
		}

		if ( 'redirections' === $panel ) {
			$items = \RankMath\Redirections\DB::get_redirections( [ 'limit' => 1000 ] );

			$data['redirections'] = $items['redirections'];
		}

		return $data;
	}

	/**
	 * Check if given action is in the list of allowed actions.
	 *
	 * @param string $perform Action to check.
	 *
	 * @return bool
	 */
	private function is_action_allowed( $perform ) {
		$allowed = [ 'settings', 'postmeta', 'termmeta', 'usermeta', 'redirections', 'blocks', 'deactivate' ];
		return $perform && in_array( $perform, $allowed, true );
	}
}
