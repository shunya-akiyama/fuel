<?php
use Orm\Model;

class Model_Image extends Model{
    protected static $_table_name = 'images';
    protected static $_primary = array('id');
    protected static $_belongs_to = array(
        'image' => array(
            'model_to' => 'Model_Post',
            'key_from' => 'post_id',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

	protected static $_properties = array(
		'id',
		'fiename',
		'path',
		'mimetype',
		'post_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('fiename', 'Fiename', 'required|max_length[100]');
		$val->add_field('path', 'Path', 'required|max_length[200]');
		$val->add_field('mimetype', 'Mimetype', 'required|max_length[50]');
		$val->add_field('post_id', 'Post Id', 'required|valid_string[numeric]');

		return $val;
	}

}
