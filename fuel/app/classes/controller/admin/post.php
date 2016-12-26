<?php
class Controller_Admin_Post extends Controller_Admin
{

	public function action_index(){
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/index', $data);
	}

	public function action_view($id = null){
		$data['post'] = Model_Post::find($id);
        $data['image'] = Model_Image::find('all',array('where'=>array(array('post_id',$id))));
        foreach ($data['image'] as $value) {
        }
		$this->template->title = "Post";
		$this->template->content = View::forge('admin/post/view', $data);
    }

	public function action_create(){
		if (Input::method() == 'POST'){
			$val = Model_Post::validate('create');
			if ($val->run()){
				$post = Model_Post::forge(array(
					'title' => Input::post('title'),
					'body' => Input::post('body'),
				));
                $config = array(
                    'path'=>DOCROOT.'assets/img/post',
                );
                Upload::process($config);
				if ($post and $post->save()){
                    if($result = Upload::get_files()){
                        foreach ($result as $file) {
                            Upload::save();
                            $img = Model_Image::forge();
                            $img->fiename = $file['name'];
                            $img->mimetype = $file['mimetype'];
                            $img->path = 'post/'.$img->fiename;
                            $img->post_id = $post['id'];
                            $img->save();
var_dump($img);
echo '<br><br>';
                        }
/*
                        exit;
                        Upload::save();
                        $img = Model_Image::forge();
                        $img->fiename = $result[0]['name'];
                        $img->mimetype = $result[0]['mimetype'];
                        $img->path = 'post/'.$img->fiename;
                        $img->post_id = $post['id'];
//                        var_dump($img);
exit;
                        $img->save();
*/
                    }
                	Session::set_flash('success', e('Added post #'.$post->id.'.'));
					Response::redirect('admin/post');
				}else{
					Session::set_flash('error', e('Could not save post.'));
				}
			}else{
				Session::set_flash('error', $val->error());
			}
		}
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/create');
	}

	public function action_edit($id = null){
		$post = Model_Post::find($id);
		$val = Model_Post::validate('edit');

		if ($val->run()){
			$post->title = Input::post('title');
			$post->body = Input::post('body');
			if ($post->save()){
				Session::set_flash('success', e('Updated post #' . $id));
				Response::redirect('admin/post');
			}else{
				Session::set_flash('error', e('Could not update post #' . $id));
			}
		}else{
			if (Input::method() == 'POST'){
				$post->title = $val->validated('title');
				$post->body = $val->validated('body');

				Session::set_flash('error', $val->error());
			}
			$this->template->set_global('post', $post, false);
		}
		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/edit');
	}

	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', e('Deleted post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}

		Response::redirect('admin/post');

	}

}
