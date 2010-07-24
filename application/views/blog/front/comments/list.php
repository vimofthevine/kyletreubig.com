				<!-- Comment List -->
				<?php echo $pagination ?> 
				<section>
<?php foreach ($comments as $comment): ?>
					<article>
						<header>
							<cite><?php echo $comment->name ?></cite>
							<time datetime="<?php echo date('Y-m-d', $comment->date) ?>">
								<?php echo $comment->verbose('date') ?> 
							</time>
							<img src="http://www.gravatar.com/avatar/<?php echo $comment->gravatar ?>" alt="" />
						</header>
						<p><?php echo $comment->text ?></p>
					</article>
<?php endforeach; ?>
				</section>
				<?php echo $pagination ?> 
				<!-- End of Comment List -->
