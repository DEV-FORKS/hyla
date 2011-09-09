<?php defined('SYSPATH') or die('No direct script access.');

abstract class Abstract_Controller_Hyla_OAuth2 extends Abstract_Controller_Hyla_Base {

	/**
	 * @var OAuth2_Provider
	 */
	protected $_oauth;

	/**
	 * @var string Client ID
	 */
	protected $_oauth_client_id = NULL;

	/**
	 * @var string User ID
	 */
	protected $_oauth_user_id = NULL;

	/**
	 * @var boolean Verify OAuth token automatically?
	 */
	protected $_oauth_verify = TRUE;

	public function before()
	{
		parent::before();

		$this->_oauth = OAuth2_Provider::factory($this->request);

		if ($this->_oauth_verify)
		{
			$this->_oauth_verify_token();
		}
	}

	protected function _oauth_verify_token($scope = NULL)
	{
		try
		{
			list($client_id, $user_id) = $this->_oauth->verify_token($scope);

			$this->_oauth_client_id = $client_id;
			$this->_oauth_user_id = $user_id;
		}
		catch (OAuth2_Exception_InvalidToken $e)
		{
			$this->response->headers('WWW-Authenticate', 'Bearer');
			throw new HTTP_Exception_401('Authentication Failed');
		}
	}
}