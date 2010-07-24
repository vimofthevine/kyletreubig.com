				<!-- Blog List -->
				<article>
					<h1>My Blog</h1>
					<p>
						I intend to use blog posts to document the progress I make on developing
						this website.  At the least, I will make a post every time I release an
						update to the server, but I hope to write posts between releases to give
						an insight into my development process.  Check back here frequently so
						you don't miss anything.
					</p>
					<h2><?php echo $legend ?></h2>
				</article>
<?php if (count($articles) == 0): ?>
				<p class="error">There are no articles that have been published.</p>
<?php else: ?>
				<?php echo $pagination->render() ?> 
<?php foreach ($articles as $article): ?>
				<article class="excerpt">
					<header>
						<h1><?php echo $article->title ?></h1>
						<p>
							<cite>by <?php echo ucfirst($article->author->load()->username) ?></cite>
							<time datetime="<?php echo date('Y-m-d', $article->date) ?>" pubdate="pubdate">
								<?php echo $article->verbose('date') ?> 
							</time>
						</p>
						<p>
							Posted to <?php echo HTML::anchor($article->category_link,
								ucfirst($article->category->name)) ?><br />
							Tagged in <?php echo HTML::anchor($article->tag_list) ?> 
						</p>
					</header>
					<p><?php echo $article->excerpt ?></p>
				</article>
				<p class="more"><?php echo HTML::anchor($article->permalink, __('More')) ?></p>
<?php endforeach; ?> 
				<?php echo $pagination->render() ?> 
<?php endif; ?>
				<!-- End of Blog List -->
