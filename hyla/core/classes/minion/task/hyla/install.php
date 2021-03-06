<?php defined('SYSPATH') or die('No direct script access.');

class Minion_Task_Hyla_Install extends Minion_Task {

	public function execute( array $config)
	{
		Minion_CLI::write('Generating config/init.php'.PHP_EOL);
		$view = Kostache::factory('hyla/installer/config/init');
		foreach ($view->required_input() as $key => $info)
		{
			$response = Minion_CLI::read($info['line']);
			$response = Valid::not_empty($response)
				? $response
				: $info['default'];

			$view->set($key, $response);
		}

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Generating .htaccess'.PHP_EOL);
		$base_url = $view->base_url;

		$view = Kostache::factory('hyla/installer/htaccess')
			->set('base_url', $base_url);

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Generating config/couchdb.php'.PHP_EOL);
		$view = Kostache::factory('hyla/installer/config/couchdb');
		foreach ($view->required_input() as $key => $info)
		{
			$response = Minion_CLI::read($info['line']);
			$response = Valid::not_empty($response)
				? $response
				: $info['default'];

			$view->set($key, $response);
		}

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Generating couchapp/.couchapprc');

		$config = array(
			'host' => $view->host,
			'port' => $view->port,
			'db'   => $view->db,
		);
		$view = Kostache::factory('hyla/installer/couchapp/couchapprc')
			->set('config', $config);

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Generating config/rabbitmq.php'.PHP_EOL);
		$view = Kostache::factory('hyla/installer/config/rabbitmq');
		foreach ($view->required_input() as $key => $info)
		{
			$response = Minion_CLI::read($info['line']);
			$response = Valid::not_empty($response)
				? $response
				: $info['default'];

			$view->set($key, $response);
		}

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Generating config/email.php'.PHP_EOL);
		$view = Kostache::factory('hyla/installer/config/email');
		foreach ($view->required_input() as $key => $info)
		{
			$response = Minion_CLI::read($info['line']);
			$response = Valid::not_empty($response)
				? $response
				: $info['default'];

			$view->set($key, $response);
		}

		file_put_contents($view->save_path(), $view->render());

		Minion_CLI::write('Trying to push couchapp');
		// Use `media:compile` but only compile the couchapp
		exec('cd '.escapeshellarg(DOCROOT).' && ./minion media:compile --pattern=media/couchapp/monkeys');

		// Run `hyla:migrate` in order to create the OAuth2 documents
		exec('cd '.escapeshellarg(DOCROOT).' && ./minion hyla:migrate');
	}
}