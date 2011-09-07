<?php defined('SYSPATH') or die('No direct script access.');

/**
 * @package    OAuth2
 * @category   Model
 */
class Model_OAuth2_Auth_Code extends Model_OAuth2 implements Interface_Model_OAuth2_Auth_Code {

	/**
	 * @var  integer  Lifetime
	 */
	public static $lifetime = 30;

	/**
	 * Find a auth code
	 *
	 * @param string $code      code to find
	 * @param int    $client_id client id to pair with
	 *
	 * @return Model_OAuth2_Auth_Code
	 */
	public static function find_code($code, $client_id = NULL)
	{
		echo Debug::vars('Model_OAuth2_Auth_Code::find_code');die;
	}

	/**
	 * Create a auth code
	 *
	 * @param int    $client_id    client id to create with
	 * @param string $redirect_uri redirect uri to create with
	 * @param int    $user_id      the user id to create with
	 * @param string $scope        scope to create with
	 *
	 * @return Model_OAuth2_Auth_Code
	 */
	public static function create_code($client_id, $redirect_uri, $user_id = NULL, $scope = NULL)
	{
		echo Debug::vars('Model_OAuth2_Auth_Code::create_code');die;
	}

	/**
	 * Deletes a auth code
	 *
	 * @param string $code the code to delete
	 */
	public static function delete_code($code)
	{
		return Model_OAuth2_Auth_Code::find_code($code)->delete();
	}

	/**
	 * Deletes expired codes
	 *
	 * @return  integer  Number of codes deleted
	 */
	public static function deleted_expired_codes()
	{
		echo Debug::vars('Model_OAuth2_Auth_Code::deleted_expired_codes');die;
	}
}
