<?php defined('SYSPATH') OR die('No direct script access.');

/**
 * Website Template Controller
 *
 * @package     kyletreubig.com
 * @author      Kyle Treubig
 * @copyright   (c) 2010 Kyle Treubig
 * @license     MIT
 */
class Controller_Template_Website extends Controller_Template_Cms {

	/**
	 * @var Template folder
	 */
	public $template_dir = 'layout';

	/**
	 * Setup view files
	 */
	public function before() {
		parent::before();

		if ($this->auto_render)
		{
			// Prepare templates
			$this->template         = View::factory($this->template_dir.'/template');
			$this->template->header = View::factory($this->template_dir.'/header');
			$this->template->menu   = View::factory($this->template_dir.'/menu');
			$this->template->footer = View::factory($this->template_dir.'/footer');

			// Prepare media arrays
			$this->template->styles = array();
			$this->template->scripts = array();
		}
	}

	/**
	 * Cleanup media arrays
	 */
	public function after() {
		if ($this->auto_render)
		{
			$styles = array();
			$scripts = array();

			$this->template->header->styles  = array_merge($this->template->styles, $styles);
			$this->template->header->scripts = array_merge($this->template->scripts, $scripts);
		}

		parent::after();
	}

}

