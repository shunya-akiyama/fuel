<h2>Editing <span class='muted'>Image</span></h2>
<br>

<?php echo render('image/_form'); ?>
<p>
	<?php echo Html::anchor('image/view/'.$image->id, 'View'); ?> |
	<?php echo Html::anchor('image', 'Back'); ?></p>
