<article>
	<header>
		<h1><?php echo $article->title ?></h2>
		<address><?php echo ucfirst($article->author->load()->username) ?></address>
		<time datetime="<?php echo date('Y-m-d', $article->date) ?>" pubdate="pubdate">
			<?php echo date('F jS Y \a\t g:s a', $article->date) ?></time>
	<?php echo $article->text ?> 
</article>

<?php echo $comment_form ?> 

<?php echo $comment_list ?> 
