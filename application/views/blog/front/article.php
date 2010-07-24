				<!-- Blog Article -->
				<article>
					<header>
						<h1><?php echo $article->title ?></h1>
						<p>
							<cite><?php echo ucfirst($article->author->load()->username) ?></cite>
							<time datetime="<?php echo date('Y-m-d', $article->date) ?>" pubdate="pubdate">
								<?php echo $article->verbose('date') ?> 
							</time>
						</p>
					</header>
					<?php echo $article->text ?> 
				</article>
				<!-- End of Blog Article -->

				<?php echo $comment_form ?> 

				<?php echo $comment_list ?> 
