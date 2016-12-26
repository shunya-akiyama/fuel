<h2>Viewing <span class='muted'>#<?php echo $post->id; ?></span></h2>
<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
    
    <?php echo Asset::img($image->path); ?>

<?php echo Html::anchor('post', 'Back'); ?>
