				<!-- Comment Form -->
				<section class="buttons">
					<span id="comment" class="button">Post a Comment</span>
				</section>
				<section>
					<?php echo Form::open() ?> 
						<fieldset>
							<legend><?php echo $legend ?></legend>

							<?php echo isset($errors['name']) ? '<p class="error">'.$errors['name'].'</p>' : ''; ?>
							<?php $class = isset($errors['name']) ? array('class'=>'error') : NULL; ?> 
							<?php echo $comment->label('name') ?> 
							<?php echo $comment->input('name', $class) ?><br />

							<?php echo isset($errors['email']) ? '<p class="error">'.$errors['email'].'</p>' : ''; ?>
							<?php $class = isset($errors['email']) ? array('class'=>'error') : NULL; ?> 
							<?php echo $comment->label('email') ?> 
							<?php echo $comment->input('email', $class) ?><br />

							<?php echo isset($errors['url']) ? '<p class="error">'.$errors['url'].'</p>' : ''; ?>
							<?php $class = isset($errors['url']) ? array('class'=>'error') : NULL; ?> 
							<?php echo $comment->label('url') ?> 
							<?php echo $comment->input('url', $class) ?><br />

							<?php echo isset($errors['text']) ? '<p class="error">'.$errors['text'].'</p>' : ''; ?>
							<?php $class = isset($errors['text']) ? array('class'=>'error') : NULL; ?> 
							<?php echo $comment->label('text') ?> 
							<?php echo $comment->input('text', $class) ?><br />

							<?php echo Form::submit('submit', $submit, array('class'=>'submit')) ?> 
						</fieldset>
					<?php echo Form::close() ?> 
				</section>
				<!-- End of Comment Form -->
