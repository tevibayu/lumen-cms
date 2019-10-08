<?php


if (! function_exists('external_url')) {
    /**
	 * Helper to grab the external URL
	 *
	 * @return mixed
	 */
    function external_url($path = '')
    {
    	$url = url();
        return str_replace("/public", "", $url).DIRECTORY_SEPARATOR.$path;
    }
}

if (! function_exists('module_assets')) {
    /**
	 * Helper to grab the assets URL
	 *
	 * @return mixed
	 */
    function module_assets($module, $path = '')
    {
    	$url = url();
        return str_replace("/public", "", $url).'/modules/'.$module.'/Resources/assets/'.$path;
    }
}

if (! function_exists('module_url')) {
    /**
	 * Helper to grab the module URL
	 *
	 * @return mixed
	 */
    function module_url($module)
    {
    	$url = url();
        return str_replace("/public", "", $url).'/modules/'.$module;
    }
}

if (! function_exists('api_url')) {
    /**
	 * Helper to grab the module URL
	 *
	 * @return mixed
	 */
    function api_url()
    {
    	$url = url();
    	$url = str_replace("http://", "", $url);
    	$url = str_replace("https://", "", $url);
        return $url.'/api';
    }
}

if ( ! function_exists('access'))
{
	/**
	 * Access (lol) the Access:: facade as a simple function
	 */
	function access()
	{
		return app('access');
	}
}

if ( ! function_exists('mcrypt'))
{
    /**
     * Encrypting/Decrypting
     */
    function mcrypt($string, $action = 'e')
    {
        $secret_key = config('crypt.secret_key');
        $secret_id = config('crypt.secret_id');
     
        $output = false;
        $encrypt_method = "AES-256-CBC";
        $key = hash( 'sha256', $secret_key );
        $iv = substr( hash( 'sha256', $secret_id ), 0, 16 );
     
        if( $action == 'e' ) {
            $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
        }
        else if( $action == 'd' ){
            $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
        }
     
        return $output;
    }
}
