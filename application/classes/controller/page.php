<?php defined('SYSPATH') OR die('No direct script access.');

class Controller_Page extends Controller_Cms_Page {

	/**
	 * Override load method to insert updates on home page
	 */
	public function action_load() {
		Kohana::$log->add(Kohana::DEBUG, 'Executing Controller_Page::action_load');
		parent::action_load();

		$page = Request::instance()->param('page');
		if ($page == 'home')
		{
			$this->template->content .= View::factory('updates');
		}
	}

}

