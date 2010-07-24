<?php echo $header; ?>

		<div id="page">
			<section id="content">
				<?php echo $content ?> 
			</section> <!-- id="content" -->
			<aside>
<?php if (isset($side)): ?>
				<?php echo $side ?> 
<?php endif; ?>
			</aside>
			<div style="clear:both">&nbsp;</div>
		</div> <!-- id="page" -->

<?php echo $footer; ?>
