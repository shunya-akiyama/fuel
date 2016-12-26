<h2>Viewing #<?php echo $post->id; ?></h2>
<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
<?php foreach($image as $path): ?>
<?php echo Asset::img($path->path); ?>
<?php endforeach; ?>
<br>
<?php echo Html::anchor('admin/post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/post', 'Back'); ?>
