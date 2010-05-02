<section>
<h1>Blog</h1>
<p>
I intend to use blog posts to document the progress I make on developing
this website.  At the least, I will make a post every time I release an
update to the server, but I hope to write posts between releases to give
an insight into my development process.  Check back here frequently so
you don't miss anything.
</p>

<h2><?php echo $legend ?></h2>
<?php echo $pagination->render() ?> 

<?php foreach ($articles as $article): ?>
	<article>
		<header>
			<h1><?php echo HTML::anchor( Route::get('blog_permalink')->uri(array(
				'year'=>$article->year,
				'month'=>$article->month,
				'day'=>$article->day,
				'slug'=>$article->slug)), $article->title) ?></h1>
			<time datetime="<?php echo date('Y-m-d', $article->date) ?>" pubdate="pubdate">
				<?php echo date('F j, Y', $article->date) ?></time>
			<p>
				by <?php echo ucfirst($article->author->load()->username) ?> on
				<time datetime="<?php echo $article->date ?>">
					<?php echo date('F jS, Y \a\t g:s a', $article->date) ?>
				</time><br />

				Posted to <?php echo HTML::anchor( Route::get('blog_filter')->uri(array(
					'action'=>'category', 'name'=>$article->category->load()->name)),
					ucfirst($article->category->name)) ?><br />
				Tagged in 
<?php foreach ($article->tags as $tag): ?>
					<?php echo HTML::anchor( Route::get('blog_filter')->uri(array(
						'action'=>'tag', 'name'=>$tag->name)), ucfirst($tag->name)) ?>
<?php endforeach; ?>
			</p>
		</header>
		<p><?php echo Text::limit_words($article->text,100,'...') ?></p>
	</article>
<?php endforeach; ?>

<?php echo $pagination->render() ?> 

</section>
