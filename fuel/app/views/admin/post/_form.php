<?php echo Form::open(array("class"=>"form-horizontal",'enctype'=>'multipart/form-data','multiple'=>'multiple')); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Body', 'body', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('body', Input::post('body', isset($post) ? $post->body : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Body')); ?>

		</div>
        <div class="form-group">
			<?php echo Form::label('UploadImage', 'upload', array('class'=>'control-label')); ?>

				<?php echo Form::file('1'); ?>
                <?php echo Form::file('2'); ?>
                <?php echo Form::file('3'); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>
