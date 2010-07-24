			<nav>
				<ul>
					<li><?php echo HTML::anchor('', __('Home')) ?></li>
					<li><?php echo HTML::anchor('music', __('Music')) ?></li>
					<li><?php echo HTML::anchor( Route::get('blog')
						->uri(), __('Blog')) ?></li>
					<li><?php echo HTML::anchor( Route::get('page')
						->uri(array('page'=>'about')), __('About')) ?></li>
				</ul>
			</nav>
