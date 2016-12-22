<h2>Viewing <span class='muted'>#<?php echo $post->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>
<p>
	<strong>Category:</strong>
	<?php echo $post->category; ?></p>

<?php echo Html::anchor('post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('post', 'Back'); ?>