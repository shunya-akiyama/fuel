<h2>Viewing #<?php echo $post->id; ?></h2>
<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
<?php echo Asset::img($image->path); ?>
<br>
<?php echo Html::anchor('admin/post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/post', 'Back'); ?>
