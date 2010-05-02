<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Console extends Console_Controller {

	/**
	 * Restrict access
	 */
	public function before() {
		$a2 = A2::instance('auth');

		if ( ! $a2->allowed('logs', 'read'))
		{
			Kohana::$log->add('ACCESS', "Unauthorized attempt to read log files");
			Request::instance()->redirect( Route::get('admin_main')->uri() );
		}

		parent::before();
	}
}

