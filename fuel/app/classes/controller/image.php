<?php
class Controller_Image extends Controller_Template
{

	public function action_index()
	{
		$data['images'] = Model_Image::find('all');
		$this->template->title = "Images";
		$this->template->content = View::forge('image/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('image');

		if ( ! $data['image'] = Model_Image::find($id))
		{
			Session::set_flash('error', 'Could not find image #'.$id);
			Response::redirect('image');
		}

		$this->template->title = "Image";
		$this->template->content = View::forge('image/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Image::validate('create');

			if ($val->run())
			{
				$image = Model_Image::forge(array(
					'fiename' => Input::post('fiename'),
					'path' => Input::post('path'),
					'mimetype' => Input::post('mimetype'),
					'user_id' => Input::post('user_id'),
				));

				if ($image and $image->save())
				{
					Session::set_flash('success', 'Added image #'.$image->id.'.');

					Response::redirect('image');
				}

				else
				{
					Session::set_flash('error', 'Could not save image.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Images";
		$this->template->content = View::forge('image/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('image');

		if ( ! $image = Model_Image::find($id))
		{
			Session::set_flash('error', 'Could not find image #'.$id);
			Response::redirect('image');
		}

		$val = Model_Image::validate('edit');

		if ($val->run())
		{
			$image->fiename = Input::post('fiename');
			$image->path = Input::post('path');
			$image->mimetype = Input::post('mimetype');
			$image->user_id = Input::post('user_id');

			if ($image->save())
			{
				Session::set_flash('success', 'Updated image #' . $id);

				Response::redirect('image');
			}

			else
			{
				Session::set_flash('error', 'Could not update image #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$image->fiename = $val->validated('fiename');
				$image->path = $val->validated('path');
				$image->mimetype = $val->validated('mimetype');
				$image->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('image', $image, false);
		}

		$this->template->title = "Images";
		$this->template->content = View::forge('image/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('image');

		if ($image = Model_Image::find($id))
		{
			$image->delete();

			Session::set_flash('success', 'Deleted image #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete image #'.$id);
		}

		Response::redirect('image');

	}

}
