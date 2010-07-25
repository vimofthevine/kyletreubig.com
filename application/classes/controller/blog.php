<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Blog extends Controller_Blog_Articles {

	/**
	 * Setup the sidebar content
	 */
	public function after() {
		$recent_articles = Request::factory( Route::get('blog/stats')
			->uri(array('action'=>'recent_articles', 'id'=>3)))
			->execute()->response;
		$popular_articles = Request::factory( Route::get('blog/stats')
			->uri(array('action'=>'popular_articles', 'id'=>3)))
			->execute()->response;
		$recent_comments = Request::factory( Route::get('blog/stats')
			->uri(array('action'=>'recent_comments', 'id'=>3)))
			->execute()->response;

		$side = isset($this->template->side) ? $this->template->side : NULL;
		$this->template->side = $recent_articles
			. $popular_articles
			. $recent_comments
			. $side;

		parent::after();
	}
}
