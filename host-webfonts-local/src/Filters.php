<?php
/* * * * * * * * * * * * * * * * * * * * *
 *
 *  ██████╗ ███╗   ███╗ ██████╗ ███████╗
 * ██╔═══██╗████╗ ████║██╔════╝ ██╔════╝
 * ██║   ██║██╔████╔██║██║  ███╗█████╗
 * ██║   ██║██║╚██╔╝██║██║   ██║██╔══╝
 * ╚██████╔╝██║ ╚═╝ ██║╚██████╔╝██║
 *  ╚═════╝ ╚═╝     ╚═╝ ╚═════╝ ╚═╝
 *
 * @package  : OMGF
 * @author   : Daan van den Bergh
 * @copyright: © 2017 - 2024 Daan van den Bergh
 * @url      : https://daan.dev
 * * * * * * * * * * * * * * * * * * * */

namespace OMGF;

use OMGF\Frontend\Process;

class Filters {
	/**
	 * Generic filters.
	 */
	public function __construct() {
		add_filter( 'content_url', [ $this, 'force_ssl' ], 1000, 2 );
		add_filter( 'home_url', [ $this, 'force_ssl' ], 1000, 2 );
		add_filter( 'pre_update_option_omgf_optimized_fonts', [ $this, 'base64_decode_optimized_fonts' ] );
		add_filter( 'vc_get_vc_grid_data_response', [ $this, 'parse_vc_grid_data' ], 10 );
	}

	/**
	 * @since v5.0.5 omgf_optimized_fonts is base64_encoded in the frontend, to bypass firewall restrictions on
	 * some servers.
	 *
	 * @param $old_value
	 * @param $value
	 *
	 * @return bool|array
	 */
	public function base64_decode_optimized_fonts( $value ) {
		// phpcs:ignore
		if ( is_string( $value ) && base64_decode( $value, true ) ) {
			// phpcs:ignore
			return base64_decode( $value );
		}

		return $value;
	}

	/**
	 * content_url uses is_ssl() to detect whether SSL is used. This fails for servers behind
	 * load balancers and/or reverse proxies. So, we double check with this filter.
	 * @since v4.4.4
	 *
	 * @param mixed $url
	 * @param mixed $path
	 *
	 * @return mixed
	 */
	public function force_ssl( $url, $path ) {
		/**
		 * Only rewrite URLs requested by this plugin. We don't want to interfere with other plugins.
		 */
		if ( strpos( $url, OMGF_UPLOAD_URL ) === false ) {
			return $url;
		}

		/**
		 * If the user entered https:// in the Home URL option, it's safe to assume that SSL is used.
		 */
		if ( ! is_ssl() && strpos( get_home_url(), 'https://' ) !== false ) {
			$url = str_replace( 'http://', 'https://', $url );
		}

		return $url;
	}

	/**
	 * @since  v5.4.0 [OMGF-75] Parse HTML generated by Visual Composer's Grid elements, which is loaded async using AJAX.
	 * @filter vc_get_vc_grid_data_response
	 * @return string Valid HTML generated by Visual Composer.
	 */
	public function parse_vc_grid_data( $data ) {
		$processor = new Process( true );
		$data      = $processor->parse( $data );

		return $data;
	}
}
