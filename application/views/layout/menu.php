<nav>
    <h1>Navigation:</h1>
    <ul>
		<li id="homenav"><?php echo HTML::anchor( Route::get('page')
			->uri(array('page'=>'')), __('Home')) ?></li>
		<li id="aboutnav"><?php echo HTML::anchor( Route::get('page')
			->uri(array('page'=>'about')), __('About')) ?></li>
		<li id="blognav"><?php echo HTML::anchor( Route::get('blog')
			->uri(), __('Blog')) ?></li>
    </ul>
</nav>
