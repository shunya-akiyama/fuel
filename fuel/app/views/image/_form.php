<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Fiename', 'fiename', array('class'=>'control-label')); ?>

				<?php echo Form::input('fiename', Input::post('fiename', isset($image) ? $image->fiename : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Fiename')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Path', 'path', array('class'=>'control-label')); ?>

				<?php echo Form::input('path', Input::post('path', isset($image) ? $image->path : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Path')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Mimetype', 'mimetype', array('class'=>'control-label')); ?>

				<?php echo Form::input('mimetype', Input::post('mimetype', isset($image) ? $image->mimetype : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Mimetype')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($image) ? $image->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>