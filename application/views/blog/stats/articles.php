				<h1><?php echo $legend ?></h1>
<?php foreach ($articles as $article): ?>
				<article>
					<header>
						<h1><?php echo HTML::anchor($article->permalink, $article->title) ?></h1>
						<cite><?php echo $article->author->load()->username ?></cite>
						<time datetime="<?php echo date('Y-m-d', $article->date) ?>">
							<?php echo $article->verbose('date') ?> 
						</time>
					</header>
				</article>
<?php endforeach; ?>
				<p class="more"><?php echo HTML::anchor( Route::get('blog')
					->uri(), 'More') ?></p>

