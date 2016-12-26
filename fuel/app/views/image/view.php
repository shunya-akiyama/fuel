<h2>Viewing <span class='muted'>#<?php echo $image->id; ?></span></h2>

<p>
	<strong>Fiename:</strong>
	<?php echo $image->fiename; ?></p>
<p>
	<strong>Path:</strong>
	<?php echo $image->path; ?></p>
<p>
	<strong>Mimetype:</strong>
	<?php echo $image->mimetype; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $image->user_id; ?></p>

<?php echo Html::anchor('image/edit/'.$image->id, 'Edit'); ?> |
<?php echo Html::anchor('image', 'Back'); ?>