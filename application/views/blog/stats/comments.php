				<h1><?php echo $legend ?></h1>
<?php foreach ($comments as $comment): ?>
				<article>
					<header>
						<h1>To <?php echo HTML::anchor($comment->parent->load()->permalink, $comment->parent->title) ?></h1>
						<cite><?php echo $comment->name ?></cite>
						<time datetime="<?php echo date('Y-m-d', $comment->date) ?>">
							<?php echo $comment->verbose('date') ?> 
						</time>
					</header>
					<p><?php echo strip_tags(Text::limit_words($comment->text, 15, '...')) ?></p>
				</article>
<?php endforeach; ?>

