<?php

function this_is_comment_form() {
    ?>


<div id="respond" class="comment-respond">
	<h3 id="reply-title" class="comment-reply-title">Laisser un commentaire 
		<small>
			<a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Annuler la réponse.</a>
		</small>
	</h3>
	
	<form action="#" method="post" id="commentform" class="comment-form" novalidate>
	
		<p class="comment-notes">
			Votre adresse de messagerie ne sera pas publiée. Les champs obligatoires sont indiqués avec <span class="required">*</span>
		</p>							

		<p class="comment-form-author">
			<label for="author">Nom <span class="required">*</span></label> 
			<input id="author" name="author" type="text" value="" size="30" aria-required='true' />
		</p>

		<p class="comment-form-email">
			<label for="email">Adresse de contact <span class="required">*</span></label> 
			<input id="email" name="email" type="email" value="" size="30" aria-required='true' />
		</p>

		<p class="comment-form-url">
			<label for="url">Site web</label> 
			<input id="url" name="url" type="url" value="" size="30" />
		</p>

		<p class="comment-form-comment">
			<label for="comment">Commentaire</label> 
			<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
		</p>

		<p class="form-submit">
			<input name="submit" type="submit" id="submit" value="Laisser un commentaire" />
		</p>
	</form>
</div>

<?php
}
